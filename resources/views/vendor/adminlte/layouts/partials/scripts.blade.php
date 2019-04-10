<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

<!--<script src="{{ asset('/js/jquery.js') }}" type="text/javascript"></script>-->

<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<!--
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
-->
<!--
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" type="text/javascript"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js" type="text/javascript"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
-->
<script src="{{ asset('js/popper.min.js') }}"></script>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
-->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/inputmask/inputmask.min.js') }}"></script>


<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="{{ asset('/js/dropzone.js') }}" type="text/javascript"></script>-->



<script>
      $(document).ready(function(){
        $('#fecha_apertura').datepicker({
            dateFormat: 'dd-mm-yy'
        });

        $('#fecha_cierre').datepicker({
            dateFormat: 'dd-mm-yy'
        });

          $( function() {
              $( "#tabs" ).tabs();
            } );

            $('.table').DataTable({
                  responsive: true,
                  columnDefs: [
                        {
                            targets: [ 0, 1,],
                            className: 'mdl-data-table__cell--non-numeric noVis'
                        }
                  ],
                  dom: 'Bfrtip',
                  buttons: [
                        /*
                        {
                              extend: 'copy',
                              className: 'btn btn-info',
                              exportOptions: {columns: ':visible'},
                              titleAttr: 'Copiar las Columnas Visibles',
                              text: 'Copiar',
                              init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                              }
                        },*/
                        /*
                        {
                              extend: 'excel',
                              className: 'btn btn-info',
                              exportOptions: {columns: ':visible'},
                              titleAttr: 'Exportar las Columnas Visibles a Excel',
                              text: 'Excel',
                              init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                              }
                        },*/
                        /*
                        {
                              extend: 'pdf',
                              className: 'btn btn-info',
                              exportOptions: {columns: ':visible'},
                              titleAttr: 'Exportar las Columnas Visibles a PDF',
                              text: 'PDF',
                              init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                              }
                        },*/
                        /*
                        {
                              extend: 'colvis',
                              className: 'btn btn-info',
                              exportOptions: {columns: ':visible'},
                              titleAttr: 'Ver u Ocultar Columnas de la Grilla',
                              text: 'Ver/Ocultar Columnas',
                              init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                              }
                        },
                        */
/*
                        {
                              extend: 'print',
                              className: 'btn btn-info',
                              exportOptions: {columns: ':visible'},
                              titleAttr: 'Imprimir la Grilla',
                              text: 'Imprimir',
                              init: function(api, node, config) {
                                    $(node).removeClass('dt-button')
                              }
                        }
*/
                  ]
            });
      });


      window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
      ]) !!};


    /****** GENERAL ***************/

      $(document).on('click','#edit',function(event){
            $('#edit').modal('show')
      });


      $('#edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var nombre = button.data('nombre')
            var id = button.data('id')
            var modal = $(this)
            console.log("nombre: " + nombre);
            console.log("id: " + id);
            modal.find('.modal-body #nombre').val(nombre);
            modal.find('.modal-body #id').val(id);
    })


      $('#delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
      })

    /************ FIN GENERAL *************************/

    /************* PROVINCIAS ***************/

      $(document).on('click','#edit_provincia',function(event){
            $('#edit_provincia').modal('show')
      });


      $('#edit_provincia').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var nombre = button.data('nombre')
            var codigo = button.data('codigo')
            var id = button.data('id')
            var modal = $(this)
            console.log("nombre: " + nombre);
            console.log("id: " + id);
            modal.find('.modal-body #nombre').val(nombre);
            modal.find('.modal-body #codigo').val(codigo);
            modal.find('.modal-body #id').val(id);
      })


      $('#delete_provincia').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
    })

    /************ FIN PROVINCIASL *************************/
    $(document).on('click','#edit_reclamo',function(event){
          $('#edit_reclamo').modal('show')
    });


    $('#edit_reclamo').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
    })


</script>

@yield('javascript');
