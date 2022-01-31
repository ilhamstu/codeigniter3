			<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary biklan" data-toggle="modal" data-target="#iklan" hidden>
			Launch demo modal
		</button>

		<!-- Modal Iklan -->
		<div class="modal fade" id="iklan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> -->
					<div class="modal-body">
						<?php
						foreach ($ads as $item){?>
						<div class="modal-text"><?= $item->kata?></div>
						<img class="iklan" src="<?= base_url('assets/img/'.$item->foto)?>">
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<div class="fd" data-fd="<?= ($this->session->flashdata('alert')); ?>" data-nama="<?= ($this->session->userdata('nama'))?>"></div>
			<div class="container">
				<header class="header">
					<div class="hero">
						<h2 class="heading">Toko Online</h2>
						<p class="sub-heading">Bungaku</p>
					</div>
					<div class="features feature-1">
						<h4 class="price">Rp 50.000</h4>
						<p class="item">Bunga Matahari</p>
					</div>
					<div class="features feature-2">
						<h4 class="price">Rp75.000</h4>
						<p class="item">Bunga Tulip</p>
					</div>
				</header>
			</div>
			<section class="categories">
				<h2>Category</h2>
				<?php foreach ($jns as $item) : ?>
				<div class="category"><a href="<?= base_url('user/q_kategori/'.$item->idKat)?>" class="link">
						<div class="icon">🌻</div>
						<h3><?= $item->namaKat ?></h3>
					</a></div>
				<?php endforeach ?>
			</section>
			<section class="Product" id="Product">
				<h2>Product</h2>
				<?php foreach($produk as $item) : ?>
				<div class=" card card-product" style="width: 15rem;">
					<img src="<?= base_url();?>/assets/img/<?= $item->foto ?>" alt="" class="card-img-top">
					<div class="card-body-product">
						<h3 class="card-title"><?= $item->namaProduk?></h3>
						<h5>Rp <?= $item->harga?></h5>
						<p class="card-text"><?= $item->deskripsiProduk?></p>
						<a href="<?= base_url('user/add_keranjang/'.$item->idProduk)?>" class="btn btn-outline-primary">Add to Cart</a>
						<a href="<?= base_url('user/add_wishlist/'.$item->idProduk)?>" class="btn btn-md bbtn-outline-primary"><i class="far fa-heart"></i></a>
					</div>
				</div>
				<?php endforeach ?>
			</section>
			<section class="footer" id="Footer">
				<div class="container">
					<div class="row">
						<div class="footer-col">
							<h4>Get Help</h4>
							<ul>
								<li><a href="<?= base_url('user')?>">Home</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Payment Option</a></li>
							</ul>
						</div>
						<div class="footer-col">
							<h4>Categories</h4>
							<ul>
								<?php
								foreach ($jns as $item){?>
								<li><a href="<?= base_url('user/q_kategori/'.$item->idKat)?>"><?= $item->namaKat?></a></li>
								<?php }?>
							</ul>
						</div>
						<div class="footer-col">
							<h4>Find Us</h4>
							<ul>
								<div class="social-links">
									<a href="#"><i class="fab fa-facebook"></i></a>
									<a href="#"><i class="fab fa-twitter"></i></a>
									<a href="#"><i class="fab fa-instagram"></i></a>
									<a href="#"><i class="fab fa-linkedin-in"></i></a>
								</div>
							</ul>
						</div>
					</div>
				</div>
			</section>