<script src="<?php echo base_url(); ?>assets/front/assets/js/select2.min.js"></script>
<script type="text/javascript">
  $('select').select2();
</script>
<script type="text/javascript">

		  $('#deleteKeranjang').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var link = button.data('link') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-footer a').attr('href',link)
		})
</script>