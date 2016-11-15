    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>  

<script type="text/javascript">
      $(function () {
        $('#tablePelanggan').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": false, 
          "autoWidth": true,
          // "pageLength":5
        });
      });



$('#deleteUser').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var link = button.data('link') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#linkDeleteOrnamen').attr('href',link)
})
$('#modalEdit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var kategori = button.data('kategori') // Extract info from data-* attributes
  var deskripsi = button.data('deskripsi') // Extract info from data-* attributes
  var slug = button.data('slug') // Extract info from data-* attributes
  var idkategori = button.data('idkategori') // Extract info from data-* attributes
  var metatitle = button.data('metatitle') // Extract info from data-* attributes
  var metadeskripsi = button.data('metadeskripsi') // Extract info from data-* attributes
  var metakeyword = button.data('metakeyword') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  // modal.find('#linkDeleteOrnamen').attr('href',link)
  modal.find('#kategori').attr('value',kategori)
  modal.find('#deskripsi').attr('value',deskripsi)
  modal.find('#slug').attr('value',slug)
  modal.find('#idkategori').attr('value',idkategori)
  modal.find('#metatitle').attr('value',metatitle)
  modal.find('#metadeskripsi').attr('value',metadeskripsi)
  modal.find('#metakeyword').attr('value',metakeyword)
})

</script>