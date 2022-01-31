<div class="fd" data-fd="<?= ($this->session->flashdata('alert')); ?>" data-nama="<?= ($this->session->userdata('nama'))?>"></div>
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade active show" id="tab-content-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="main-card mb-3">
                                            <div class="card-body">
                                                <ul class="nav nav-pills nav-fill">
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg14-0" class="active nav-link">Belum Bayar</a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg14-1" class="nav-link">Dikemas</a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg14-2" class="nav-link">Dikirim</a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg14-3" class="nav-link">Diterima</a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg14-4" class="nav-link">Selesai</a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg14-5" class="nav-link">Dibatalkan</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab-eg14-0" role="tabpanel">
                                                        <div class="main-card mb-3">
                                                            <table class="table table-bordered table-hover">
                                                                <thead style="text-align:center">
                                                                    <th colspan="6" class="table-active"><h4>Keranjang</h4></th>
                                                                </thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Tanggal Order</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Total Harga</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                <?php
                                                                $no=1; 
                                                                foreach($kwbb as $item){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++; ?></th>
                                                                    <td><?= $item->namaProduk; ?></td>
                                                                    <td><?= $item->tglOrder; ?></td>
                                                                    <td><?= $item->jumlah; ?></td>
                                                                    <td><?= $item->subtotal?></td>
                                                                    <td>
                                                                        <a href="<?= base_url('user/checkout/'.$item->idDetailOrder)?>" class="btn btn-primary">Checkout</a>
                                                                        <a href="<?= site_url('user/batal/'.$item->idOrder);?>" nama="<?= $item->namaProduk?>" class="btn btn-danger btn-batal">Batalkan</a>
                                                                    </td>
                                                                </tr>
                                                                <?php }?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab-eg14-1" role="tabpanel">
                                                        <div class="main-card mb-3">
                                                            <table class="table table-bordered table-hover">
                                                                <thead style="text-align:center">
                                                                    <th colspan="5" class="table-active"><h4>Keranjang</h4></th>
                                                                </thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Tanggal Order</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Total Harga</th>
                                                                </tr>
                                                                <?php
                                                                $no=1; 
                                                                foreach($kwkm as $item){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++; ?></th>
                                                                    <td><?= $item->namaProduk; ?></td>
                                                                    <td><?= $item->tglOrder; ?></td>
                                                                    <td><?= $item->jumlah; ?></td>
                                                                    <td><?= $item->subtotal?></td>
                                                                </tr>
                                                                <?php }?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab-eg14-2" role="tabpanel">
                                                        <div class="main-card mb-3">
                                                            <table class="table table-bordered table-hover">
                                                                <thead style="text-align:center">
                                                                    <th colspan="5" class="table-active"><h4>Keranjang</h4></th>
                                                                </thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Tanggal Order</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Total Harga</th>
                                                                </tr>
                                                                <?php
                                                                $no=1; 
                                                                foreach($kwkr as $item){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++; ?></th>
                                                                    <td><?= $item->namaProduk; ?></td>
                                                                    <td><?= $item->tglOrder; ?></td>
                                                                    <td><?= $item->jumlah; ?></td>
                                                                    <td><?= $item->subtotal?></td>
                                                                </tr>
                                                                <?php }?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab-eg14-3" role="tabpanel">
                                                        <div class="main-card mb-3">
                                                            <table class="table table-bordered table-hover">
                                                                <thead style="text-align:center">
                                                                    <th colspan="5" class="table-active"><h4>Keranjang</h4></th>
                                                                </thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Tanggal Order</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Total Harga</th>
                                                                </tr>
                                                                <?php
                                                                $no=1; 
                                                                foreach($kwtr as $item){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++; ?></th>
                                                                    <td><?= $item->namaProduk; ?></td>
                                                                    <td><?= $item->tglOrder; ?></td>
                                                                    <td><?= $item->jumlah; ?></td>
                                                                    <td><?= $item->subtotal?></td>
                                                                </tr>
                                                                <?php }?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab-eg14-4" role="tabpanel">
                                                        <div class="main-card mb-3">
                                                            <table class="table table-bordered table-hover">
                                                                <thead style="text-align:center">
                                                                    <th colspan="5" class="table-active"><h4>Keranjang</h4></th>
                                                                </thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Tanggal Order</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Total Harga</th>
                                                                </tr>
                                                                <?php
                                                                $no=1; 
                                                                foreach($kws as $item){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++; ?></th>
                                                                    <td><?= $item->namaProduk; ?></td>
                                                                    <td><?= $item->tglOrder; ?></td>
                                                                    <td><?= $item->jumlah; ?></td>
                                                                    <td><?= $item->subtotal?></td>
                                                                </tr>
                                                                <?php }?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab-eg14-5" role="tabpanel">
                                                        <div class="main-card mb-3">
                                                            <table class="table table-bordered table-hover">
                                                                <thead style="text-align:center">
                                                                    <th colspan="5" class="table-active"><h4>Keranjang</h4></th>
                                                                </thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Tanggal Order</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Total Harga</th>
                                                                </tr>
                                                                <?php
                                                                $no=1; 
                                                                foreach($kwbt as $item){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++; ?></th>
                                                                    <td><?= $item->namaProduk; ?></td>
                                                                    <td><?= $item->tglOrder; ?></td>
                                                                    <td><?= $item->jumlah; ?></td>
                                                                    <td><?= $item->subtotal?></td>
                                                                </tr>
                                                                <?php }?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>