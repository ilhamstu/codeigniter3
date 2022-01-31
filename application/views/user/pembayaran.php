<div class="fd" data-fd="<?= ($this->session->flashdata('alert')); ?>" data-nama="<?= ($this->session->userdata('nama'))?>"></div>
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade active show" id="tab-content-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="main-card mb-3">
                                            <div class="card-body">
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
                                                                    <th>Jumlah</th>
                                                                    <th>Total Bayar</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                <?php
                                                                $no=1; 
                                                                foreach($byr as $item){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no++; ?></th>
                                                                    <td><?= $item->namaProduk; ?></td>
                                                                    <td><?= $item->jumlah; ?></td>
                                                                    <td><?= $item->subtotal?></td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-primary">Konfirmasi Pembayaran</a>
                                                                        <!-- <a href="<?= site_url('user/batal/'.$item->idOrder);?>" nama="<?= $item->namaProduk?>" class="btn btn-danger btn-batal">Batalkan</a> -->
                                                                    </td>
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