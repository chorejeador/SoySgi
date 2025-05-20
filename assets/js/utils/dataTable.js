function obtenerLenguaje() {
	return {
		"decimal": "",
		"emptyTable": "No hay información",
		"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
		"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
		"infoFiltered": "(Filtrado de _MAX_ total entradas)",
		"infoPostFix": "",
		"thousands": ",",
		"lengthMenu": "Mostrar _MENU_ Entradas",
		"loadingRecords": "Cargando...",
		"processing": "<h5 class='text-success d-flex align-items-center justify-content-center'><div class='loading-spinner me-2'><i class='ri ri-loader-4-line animate-spin'></i></div> Procesando...</h5>",
		"search": "Buscar:",
		"zeroRecords": "Sin resultados encontrados",
		"paginate": {
			"first": "Primero",
			"last": "Ultimo",
			"next": "Siguiente",
			"previous": "Anterior"
		}
	};
}

function renderEstado(data) {
	return `
    <span class="${data == 1 ? 'text-success' : 'text-danger'}">
        <i class="${data == 1 ? 'ri-checkbox-circle-line fs-17 align-middle' : 'ri-close-circle-line fs-17 align-middle'}"></i>${data == 1 ? 'Activo' : 'Inactivo'}
    </span>
    `;
}

export {obtenerLenguaje, renderEstado};
