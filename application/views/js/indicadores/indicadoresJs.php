<script>
	function toggleResponsiveWrapper() {
		const wrapper = document.getElementById('tblDocumentos');
		if (window.innerWidth < 1140) {

			wrapper.classList.add('table-responsive');
		} else {

			wrapper.classList.remove('table-responsive');
		}
	}

	window.addEventListener('load', toggleResponsiveWrapper);
	window.addEventListener('resize', toggleResponsiveWrapper);


	var table = null;
	var selectedAreas = [];
	var areasCache = null;


	$(document).ready(function () {
		initUI();
		loadAreas();
		initTable();
	});

	function initUI() {
		// Abrir / cerrar sidebar
		$('#btnFiltro').on('click', function () {
			openSidebar();
		});
		$('#closeSidebar, #offcanvasBackdrop').on('click', function () {
			closeSidebar();
		});


		$('#btnApplyFilters').on('click', function () {
			applyFiltersFromUI();
			closeSidebar();
			reloadTable();
		});
		$('#btnClearFilters').on('click', function () {
			clearFiltersUI();
			applyFiltersFromUI();
			reloadTable();
		});

		$('#btnBuscar').on('click', function () {
			reloadTable();
		});
		$('#filtro').on('keydown', function (e) {
			if (e.key === 'Enter') {
				e.preventDefault();
				reloadTable();
			}
		});
	}

	function openSidebar() {
		$('#sidebarFilter').addClass('open').attr('aria-hidden', 'false');
		$('#offcanvasBackdrop').removeClass('d-none');
	}

	function closeSidebar() {
		$('#sidebarFilter').removeClass('open').attr('aria-hidden', 'true');
		$('#offcanvasBackdrop').addClass('d-none');
	}


	function loadAreas() {
		$.ajax({
			url: 'getAreas/ACTIVO',
			method: 'GET',
			dataType: 'json'
		}).done(function (res) {
			areasCache = res || [];
			renderAreasList(areasCache);
		}).fail(function () {
			areasCache = [
				{IdArea: 1, Descripcion: 'Informatica'},
				{IdArea: 2, Descripcion: 'Mantenimiento'},
				{IdArea: 3, Descripcion: 'Calidad'}
			];
			renderAreasList(areasCache);
		});
	}

	/* -------------------------
	Render checkboxes de áreas en el sidebar
	------------------------- */
	function renderAreasList(areas) {
		var $container = $('#areasList');
		$container.empty();

		if (!areas || areas.length === 0) {
			$container.append('<p class="text-muted">No hay áreas disponibles.</p>');
			return;
		}

		areas.forEach(function (a) {
			// Aceptar tanto IdArea como id por compatibilidad con distintos endpoints
			var idVal = (a.IdArea !== undefined) ? a.IdArea : (a.id !== undefined ? a.id : '');
			var id = 'area_chk_' + idVal;
			var $item = $('<div class="area-item"></div>');
			var $chk = $('<input type="checkbox" class="area-checkbox">')
				.attr('id', id)
				.attr('data-id', String(idVal))
				.attr('data-desc', a.Descripcion || '');
			var $label = $('<label></label>').attr('for', id).text(a.Descripcion || ('Área ' + idVal));
			$item.append($chk).append($label);
			$container.append($item);
		});

		if (selectedAreas && selectedAreas.length) {
			$('.area-checkbox').each(function () {
				var aid = String($(this).data('id'));
				if (selectedAreas.indexOf(aid) !== -1) $(this).prop('checked', true);
			});
		}
	}

	/* -------------------------
	Leer selección del UI y actualizar selectedAreas
	------------------------- */
	function applyFiltersFromUI() {
		selectedAreas = [];
		$('.area-checkbox:checked').each(function () {
			selectedAreas.push(String($(this).data('id')));
		});
	}

	function clearFiltersUI() {
		$('.area-checkbox').prop('checked', false);
		selectedAreas = [];
	}

	function initTable() {
		if ($.fn.dataTable.isDataTable('#tblDocumentos')) {
			$('#tblDocumentos').DataTable().clear().destroy();
		}

		table = $('#tblDocumentos').DataTable({
			ajax: {
				url: 'indicadoresSearch',
				type: 'POST',
				data: function (d) {
					d.filtro = $('#filtro').val() || '';
					d.areas = selectedAreas; // envia array (server debe aceptar)
				}
			},
			serverSide: true,
			processing: true,
			searching: false,
			paging: true,
			info: true,
			lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, 'Todo']],

			orderFixed: [[7, 'asc']],
			order: [[0, 'desc'], [1, 'asc']],
			columns: [
				{data: 'Anio'},
				{data: 'Mes'},
				{data: 'Nombre'},
				{data: 'Descripcion'},
				{data: 'FechaCrea'},
				{data: 'FechaEdita'},
				{data: 'Opcion'},
				{data: 'NombreArea', visible: false}
			],
			rowGroup: {
				dataSrc: 'NombreArea',
				startRender: function (rows, group) {

					var g = (group || 'Sin área').toString().trim();
					return g + ' <span class="badge badge-light ml-2">' + rows.count() + ' registros</span>';
				},
				className: 'dt-rowgroup'
			},
			drawCallback: function () {

			}
		});
	}

	function reloadTable() {
		if (!table) initTable();
		else table.ajax.reload(null, false);
	}
</script>
