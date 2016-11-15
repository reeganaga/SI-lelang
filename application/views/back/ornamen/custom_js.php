    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>  
    
<script type="text/javascript">
      $(function () {
        $('#tableOrnamenAtas,#tableOrnamenKonten,#tableOrnamenBawah').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          // "scrollX":"400px",
          "scrollCollapse": true,
          "info": false, 
          "autoWidth": false,
          "pageLength":5
        });
      });

$('#editOrnamen').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var image = button.data('image') // Extract info from data-* attributes
  var type = button.data('type') // Extract info from data-* attributes
  var kode = button.data('kode') // Extract info from data-* attributes
  var gambarTemp = button.data('gambartemp') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#gambarTemp').attr('src',image)
  modal.find('#idUpdate').attr('value',id)
  modal.find('#typeUpdate').attr('value',type)
  modal.find('#kodeUpdate').attr('value',kode)
  modal.find('#gambarTempUpdate').attr('value',gambarTemp)
})

$('#deleteOrnamen').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var link = button.data('link') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#linkDeleteOrnamen').attr('href',link)
})

$('#addOrnamen').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var type = button.data('type') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#typeAdd').attr('value',type)
})

</script>