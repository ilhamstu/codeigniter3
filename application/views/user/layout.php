<DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Toko Online </title>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
			integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/ui/style.css')?>">
		<link href="<?= base_url('assets/ui/sweetalert2.min.css')?>" rel="stylesheet">
	</head>

	<body>
		<div class="container">
			<nav class="menu">
				<div class="menu-toggle"><input type="checkbox" /><span></span><span></span><span></span></div>
				<div class="brand">
					<h3>Florist</h3>
				</div>
				<ul class="menu-list">
					<form class="form-inline my-2 my-lg-0" action="<?= base_url('dashboard/q_cari')?>" method="post">
						<input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari">
					</form>
					<li><a href="<?= site_url('user');?>">Home</a></li>
					<li>
						<div class="dropdown">
							<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								My Account
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="<?= site_url('user/profil');?>">Profil</a>
								<a class="dropdown-item" href="<?= site_url('user/keranjang');?>">Keranjang Belanja</a>
								<a class="dropdown-item" href="<?= site_url('user/pembayaran');?>">Detail Pembayaran</a>
								<a class="dropdown-item" href="<?= site_url('user/wishlist');?>">Wishlist</a>
								<a class="dropdown-item" href="<?= site_url('login/logout')?>">Logout</a>
							</div>
						</div>
				</ul>
			</nav>
		</div>
			<?= $contents?>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
			integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
		</script>
		<script type="text/javascript" src="<?= base_url('assets/ui/assets/scripts/sweetalert2.all.min.js')?>"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
		</script>
		<script src="https://kit.fontawesome.com/fbd93ca048.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?= base_url('assets/ui/assets/scripts/myscript.js')?>"></script>
		<script type="text/javascript">
			const menuToggle = document.querySelector('.menu-toggle');
			const nav = document.querySelector('nav ul');

			menuToggle.addEventListener('click', function () {
					nav.classList.toggle('slide');
				}

			);

			$(document).ready(function () {
				setTimeout(function () {
					$(".biklan").trigger('click');
				}, 500);
			});
			</script>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#myModal').on('show.bs.modal', function (e) {
						var rowid = $(e.relatedTarget).data('id');
						//menggunakan fungsi ajax untuk pengambilan data
						$.ajax({
							type : 'post',
							url : 'detail.php',
							data :  'rowid='+ rowid,
							success : function(data){
							$('.fetched-data').html(data);//menampilkan data ke dalam modal
							}
						});
					});
				});
			</script>
	</body>

	</html>
