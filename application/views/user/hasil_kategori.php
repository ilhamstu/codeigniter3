
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
			
			<section class="Product" id="Product">
				<h2>Sort by Kategori</h2>
				<?php if($cek > 0){?>
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
				<?php endforeach?>
				<?php } else{?>
					<center><h2>Produk Kosong</h2></center>
				<?php } ?>
			</section>
			<section class="footer" id="Footer">
				<div class="container">
					<div class="row">
						<div class="footer-col">
							<h4>Get Help</h4>
							<ul>
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