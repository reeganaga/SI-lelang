  <script src="<?php echo base_url(); ?>assets/front/assets/js/jquery.mixitup.js"></script>
  <!-- <script src="assets/js/jquery.magnific-popup.js"></script> -->
<script type="text/javascript">
$(document).ready(function() {

    // MIXITUP PORTFOLIO
    $(function(){
        $('#container-mixitup').mixItUp();
    });
    // MAGNIFIC POPUP
	$('#container-mixitup').magnificPopup({
	  delegate: 'a', // child items selector, by clicking on it popup will open
	  type: 'image'
	  // other options
	});

});

$('#modal-bidding').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idbarang = button.data('idbarang') // Extract info from data-* attributes
  var slug = button.data('slug') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('#modal_id_barang').text('New message to ' + recipient)
  modal.find('#modal_id_barang').val(idbarang)
  modal.find('#modal_slug_barang').val(slug)
})

</script>