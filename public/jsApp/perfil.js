$(document).on('ready', function() {

    loadImage();

    function loadImage() {
        $.ajax({
            url: 'buscar-imagen-usuario',
            type: 'get',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
            },
            // beforeSend: function() {
            //     loadingUI('Actualizando');
            // }
        }).done(function(data) {
            console.log(data)
            if (data.photo == '' || data.photo === null) {
                iconoDropZone = '<i class="fa-10x far fa-user-circle"></i><br><h6>Click para agregar Foto.</h6>';
                configuraDropZone(iconoDropZone);
            } else {
                iconoDropZone = '<img class="rounded-circle" src="' + data.photo + '" style="width:100%;height:100%">';
                configuraDropZone(iconoDropZone);
            }

            $.unblockUI();

        }).fail(function(statusCode, errorThrown) {
            $.unblockUI();
            console.log(errorThrown);
            ajaxError(statusCode, errorThrown);
        });

    }

    CargaTablero();

    function CargaTablero() {
        $.ajax({
            url: 'listar_resumen_ticket_usuarios',
            type: 'get',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
            },
            beforeSend: function() {
                loadingUI('Actualizando');
            }
        }).done(function(response) {

            console.log(response)
            obj = response.data;
            $.each(obj, function(key, value) {
                if (value.grupo == 1) { // Abiertos
                    TicketsAbierto = value.cantidad;
                } else if (value.grupo == 2) { // En Procesos
                    TicketsProcesos = value.cantidad;
                } else if (value.grupo == 3) { // Pausados
                    TicketsPausados = value.cantidad;
                } else if (value.grupo == 4) { // Terminados
                    TicketsTerminados = value.cantidad;
                } else if (value.grupo == 5) { // Total Enviados
                    TicketsTodos = value.cantidad;
                } else if (value.grupo == 6) { // Total Anulados
                    TicketsAnulados = value.cantidad;
                }


            });

            Morris.Bar({
                element: 'graph_tickec',
                data: [{
                    device: 'Abiertos',
                    Ticket: TicketsAbierto
                }, {
                    device: 'En Procesos',
                    Ticket: TicketsProcesos
                }, {
                    device: 'Pausados',
                    Ticket: TicketsPausados
                }, {
                    device: 'Terminados',
                    Ticket: TicketsTerminados
                }, {
                    device: 'Resueltos',
                    Ticket: TicketsTodos
                }, {
                    device: 'Anulados',
                    Ticket: TicketsAnulados
                }],
                xkey: 'device',
                ykeys: ['Ticket'],
                labels: ['Ticket'],
                barRatio: 0.4,
                barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                xLabelAngle: 35,
                hideHover: 'auto',
                resize: true
            });

            $.unblockUI();

        }).fail(function(statusCode, errorThrown) {
            $.unblockUI();
            console.log(errorThrown);
            ajaxError(statusCode, errorThrown);
        });

    }

    muestraDataTables()

    function muestraDataTables() {

        destroy_existing_data_table('#TableTickets');
        $.fn.dataTable.ext.pager.numbers_length = 4;
        objetoDataTables_personal = $('#TableTickets').DataTable({
            responsive: true,
            "order": [
                [1, "desc"]
            ],
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            //"dom"                                : '<"top"i>rt<"bottom"flp><"clear">',
            "paginationType": "input",
            "sPaginationType": "full_numbers",
            "language": {
                "searchPlaceholder": "Buscar",
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ Registros",
                "sZeroRecords": "No se encontró ningun Registro con la Condición del Filtro",
                "sEmptyTable": "Ningun Registro Agregado aún...",
                "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ Registro",
                "sInfoEmpty": "De 0 al 0 de un total de 0 Registro",
                "sInfoFiltered": "(filtrado de un total de _MAX_ Registros)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": loadingUI('Procesando...', 'white'),
                "oPaginate": {
                    "sFirst": '<i class="fas fa-angle-double-left"></i>',
                    "sLast": '<i class="fas fa-angle-double-right"></i>',
                    "sNext": '<i class="fas fa-angle-right"></i>',
                    "sPrevious": '<i class="fas fa-angle-left"></i>',
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            "lengthMenu": [
                [5, 10, 20, 25, 50, -1],
                [5, 10, 20, 25, 50, "Todos"]
            ],
            "iDisplayLength": 10,
            "ajax": {
                "method": "get",
                "url": "listar-tickets-perfil",
                "data": {}
            },
            "initComplete": function(settings, json) {
                $.unblockUI();
            },
            "columns": [{
                "data": 0
            }, {
                "data": 1,
            }, {
                "data": 2,
                "className": 'dt-center'
            }, {
                "data": 3,
                "className": 'dt-center'
            }, {
                "data": 4,
            }],
            "columnDefs": [{
                "width": "5%",
                "targets": [0]
            }, {
                "width": "30%",
                "targets": [
                    1, 2
                ]
            }, {
                "width": "15%",
                "targets": [
                    3, 4
                ]
            }]


        });


    }

    function configuraDropZone(iconoDropZone) {

        Dropzone.autoDiscover = false;
        if (Dropzone.instances.length > 0) Dropzone.instances.forEach(bz => bz.destroy());
        $("#formDropZone").html('');
        $("#formDropZone").append("<form action='subir-foto' method='POST' files='true' enctype='multipart/form-data' id='dZUpload' class='dropzone borde-dropzone' style='width: 100%;padding: 0;cursor: pointer;'>" +
            "<div style='padding: 0;margin-top: 0em;' class='dz-default dz-message text-center'>" +
            iconoDropZone +
            "</div></form>");

        myAwesomeDropzone = myAwesomeDropzone = {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            // removedfile: function(file) {
            //     var name = file.upload.filename;
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            //         },
            //         type: 'POST',
            //         url: '{{ url("delete") }}',
            //         data: {
            //             filename: name
            //         },
            //         success: function(data) {
            //             console.log("File has been successfully removed!!");
            //         },
            //         error: function(e) {
            //             console.log(e);
            //         }
            //     });
            //     var fileRef;
            //     return (fileRef = file.previewElement) != null ?
            //         fileRef.parentNode.removeChild(file.previewElement) : void 0;
            // },
            params: {},
            success: function(file, response) {
                console.log(response);
                fotoSubida = response
            },
            error: function(file, response) {
                return false;
            }
        }

        var myDropzone = new Dropzone("#dZUpload", myAwesomeDropzone);

        myDropzone.on("queuecomplete", function(file, response) {

            if (Dropzone.instances.length > 0) Dropzone.instances.forEach(bz => bz.destroy());
            iconoDropZone = '<img class="rounded-circle" src="' + fotoSubida + '" style="width:100%;height:100%">';
            configuraDropZone(iconoDropZone);

        });
    }


});