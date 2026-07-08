<script>
    $(document).ready(function () {
        if ($.fn.DataTable.isDataTable('#catGestion') === false) {
            $('#catGestion').DataTable();
        }

        buscar();

        $(document).on('change', '.form-check-input', function () {
            updateMedals();
            updateClearFiltersButton();
            buscar();
        });

        $(document).on('click', '#clearFilters', function () {
            $('.form-check-input').prop('checked', false);
            updateMedals();
            updateClearFiltersButton();
            buscar();
        });

        $(document).on('click', '#searchButton', function () {
            buscar();
        });

        updateMedals();
        updateClearFiltersButton();
    });

    function updateClearFiltersButton() {
        var hasSelectedFilters = $('.form-check-input:checked').length > 0;
        $('#clearFilters').toggle(hasSelectedFilters);
    }

    function updateMedals() {
        $('#medalContainer').empty();

        $('.form-check-input:checked').each(function () {
            var categoryId = $(this).val();
            var categoryLabel = $('#category' + categoryId).next('.category_label').text();

            $('#medalContainer').append(
                '<span class="badge bg-secondary me-1">' + categoryLabel + '</span> '
            );
        });
    }

    function buscar() {
        var selectedCategories = [];

        $('.form-check-input:checked').each(function () {
            selectedCategories.push($(this).val());
        });

        if ($.fn.DataTable.isDataTable('#catImagenes')) {
            $('#catImagenes').DataTable().destroy();
            $('#catImagenes tbody').empty();
        }

        $('#catImagenes').DataTable({
            ajax: {
                url: "filtrarImagenes",
                type: "POST",
                data: function (d) {
                    d.categorias = selectedCategories.join(',');
                }
            },
            stateSave: false,
            serverSide: false,
            processing: true,
            info: false,
            searching: false,
            paging: false,
            ordering: false,
            destroy: true,
            language: {
                zeroRecords: "No se encontró coincidencia",
                loadingRecords: "Cargando...",
                processing: "Procesando datos <i class='fa fa-spin fa-refresh'></i>"
            },
            columns: [
                {
                    data: "Imagen",
                    render: function (data, type, row) {
                        if (type === 'display') {
                            var imgSrc = extractSrc(data);

                            return '<a class="venobox" href="' + imgSrc + '">' + data + '</a>';
                        }
                        return data;
                    }
                }
            ],
            drawCallback: function () {
                $('.venobox').venobox({
                    border: '5px',
                    overlayColor: 'rgba(0,0,0,0.85)',
                    closeBackground: '#dc3545',
                    closeColor: '#fff',
                    share: false,
                    fitToScreen: false,
                    maxWidth: '80%',
                    maxHeight: '80%'
                });
            }
        });
    }

    function extractSrc(htmlString) {
        var div = document.createElement('div');
        div.innerHTML = htmlString;

        var img = div.querySelector('img');
        return img ? img.getAttribute('src') : '';
    }

    function baja(id, estado) {
        $.ajax({
            url: "<?php echo base_url('index.php/bajaDocumentoGeneral')?>",
            type: "POST",
            data: { id: id, estado: estado },
            success: function (data) {
                let obj = jQuery.parseJSON(data);

                $.each(obj, function (index, value) {
                    new swal({
                        text: value["mensaje"],
                        type: value["tipo"],
                        allowOutsideClick: false
                    }).then(function () {
                        if (value["tipo"] === 'success') {
                            location.reload();
                        }
                    });
                });
            }
        });
    }
</script>