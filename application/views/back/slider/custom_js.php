<script type="text/javascript">
	$('#editModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var id = button.data('id') // Extract info from data-* attributes
	  var gambar = button.data('gambar') // Extract info from data-* attributes
	  var deskripsi = button.data('deskripsi') // Extract info from data-* attributes
	  var judul = button.data('judul') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  // modal.find('.modal-title').text('New message to ' + recipient)
	  // modal.find('.modal-body input').val(recipient)
	  modal.find('#gambarTemp').attr('src',gambar)
	  modal.find('#idUpdate').attr('value',id)
	  modal.find('#deskripsiUpdate').attr('value',deskripsi)
	  modal.find('#judulUpdate').attr('value',judul)
	  modal.find('#gambarTempUpdate').attr('value',gambar)
	})

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
</script>