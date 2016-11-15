    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>  

<script type="text/javascript">
      $(function () {
        $('#tablePemesanan').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": false, 
          // "scrollX":"400px",
          "autoWidth": true,
          // "pageLength":5
        });
      });

$('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var link = button.data('link') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#linkDelete').attr('href',link)
})

$('#viewMerchandise').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var baseatas = '<?php echo base_url('assets/ornamen/atas')."/"; ?>'
  var basekonten = '<?php echo base_url('assets/ornamen/konten')."/"; ?>'
  var basebawah = '<?php echo base_url('assets/ornamen/bawah')."/"; ?>'
  var basegambar = '<?php echo base_url('assets/uploads/orders')."/"; ?>'
  var ornamenatas = button.data('ornamenatas') // Extract info from data-* attributes
  var ornamen1 = button.data('ornamenkonten1') // Extract info from data-* attributes
  var ornamen2 = button.data('ornamenkonten2') // Extract info from data-* attributes
  var ornamen3 = button.data('ornamenkonten3') // Extract info from data-* attributes
  var ornamen4 = button.data('ornamenkonten4') // Extract info from data-* attributes
  var ornamen5 = button.data('ornamenkonten5') // Extract info from data-* attributes
  var ornamen6 = button.data('ornamenkonten6') // Extract info from data-* attributes
  var ornamenbawah = button.data('ornamenbawah') // Extract info from data-* attributes
  var ucapan = button.data('ucapan') // Extract info from data-* attributes
  var tema = button.data('tema') // Extract info from data-* attributes
  var tambahan = button.data('tambahan') // Extract info from data-* attributes
  var gambar = button.data('gambar') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#linkornamenatas').attr('src',baseatas+ornamenatas)
  modal.find('#linkornamen1').attr('src',basekonten+ornamen1)
  modal.find('#linkornamen2').attr('src',basekonten+ornamen2)
  modal.find('#linkornamen3').attr('src',basekonten+ornamen3)
  modal.find('#linkornamen4').attr('src',basekonten+ornamen4)
  modal.find('#linkornamen5').attr('src',basekonten+ornamen5)
  modal.find('#linkornamen6').attr('src',basekonten+ornamen6)
  modal.find('#linkornamenbawah').attr('src',basebawah+ornamenbawah)
  modal.find('#linkgambar').attr('src',basegambar+gambar)
  // memasukkan ke tabel
  modal.find('#rowOrnamenatas').html(ornamenatas)
  modal.find('#rowOrnamen1').html(ornamen1)
  modal.find('#rowOrnamen2').html(ornamen2)
  modal.find('#rowOrnamen3').html(ornamen3)
  modal.find('#rowOrnamen4').html(ornamen4)
  modal.find('#rowOrnamen5').html(ornamen5)
  modal.find('#rowOrnamen6').html(ornamen6)
  modal.find('#rowOrnamenbawah').html(ornamenbawah)
  // memasukkan ke tabel 
  modal.find('#detail_ucapan').html(ucapan)
  modal.find('#detail_tema').html(tema)
  modal.find('#detail_tambahan').html(tambahan)

  //download
  modal.find('#downloadFoto').attr('href',basegambar+gambar)

})

    function Popup(elem) 
    {
        data = $(elem).html();
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        // var button = $(event.relatedTarget) // Button that triggered the modal
        // var type = button.data('type')
        
        // var bulan = button.data('bulan');
        // var tahun = button.data('tahun');
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        // mywindow.print();
        // mywindow.close();

        return true;
    }

</script>