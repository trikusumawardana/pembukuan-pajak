<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome</title>

	<!-- Link ke Bootstrap CSS dari CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/sb-admin-2@4.5.2/dist/css/sb-admin-2.min.css" rel="stylesheet">

	<script>
		window.onload = function() {
			// Menampilkan modal setelah halaman dimuat
			$('#welcomeModal').modal('show');
		}

		// Fungsi untuk menangani close modal
		function closeModal() {
			$('#welcomeModal').modal('hide');
			// Redirect setelah modal ditutup
			setTimeout(function() {
				window.location.href = '<?= site_url('auth') ?>'; // Arahkan ke halaman login
			}, 1000); // Redirect 1 detik setelah modal ditutup
		}
	</script>
</head>

<body>

	<!-- Modal Bootstrap dengan backdrop statis untuk menonaktifkan klik di luar modal -->
	<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="welcomeModalLabel">Attention!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Simulasi ini hanya untuk kepentingan proses pembejalaran pembukuan pajak saja.</p>

					<p class="mt-3">Data yang digunakan hanya menggunakan data dummy saja, tidak real.</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Script untuk Bootstrap JS dan dependensinya -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>