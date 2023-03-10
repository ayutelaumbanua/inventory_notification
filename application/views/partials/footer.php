<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
		<i class="fas fa-fw fa-copyright " ></i>
			<span>2023 Ayu Septiani Telaumbanua</span>
		</div>
	</div>
</footer>

<?php $this->load->view('partials/js.php') ?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>
<script src="https://timeago.yarp.com/jquery.timeago.js" type="text/javascript"></script>
<script>
	$.ajax({
		url: 'barang/get_notification',
		type: 'GET',
		dataType: 'json',
		success: function (data) {
			var i = 0
			var a= 1
			data.forEach(element => {
				if (a <= 3) {
					console.log(a);
					var nama_barang = element.nama_barang
					$('#dropdown').append(
						'<a class="dropdown-item d-flex align-items-center" href="#" id="dropdown">' +
						'<div class="mr-3">' +
						'<div class="icon-circle bg-warning">' +
						'<i class="fas fa-exclamation-triangle text-white"></i></div></div>' +
						'<div>' + '<div class="small text-gray-500" >' + $.timeago(new Date()) + '</div>' +
						'<span class="medium text-black-500">' + nama_barang + ' tersisa ' + element.stok + ' ' + element.satuan + ', lakukan tindakan.</span></div></a >'
					);
				}
				i++
				a++
			});
			$('#notif').append(
				'<span class="badge badge-danger badge-counter" id="notif">' +i + '</span>'
							
			);
			// $('.dropdown').dropdown('toggle')
		}
	})
</script>