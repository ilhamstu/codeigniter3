<div class="fd" data-fd="<?= ($this->session->flashdata('alert')); ?>"></div>
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade active show" id="tab-content-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab-eg14-0" role="tabpanel">
                                                        <div class="main-card mb-3 card">
                                                            <div class="scroll-area-sm">
                                                                <div class="scrollbar-container ps--active-y ps">
                                                                    <table class="mb-0 table table-bordered table-hover">
                                                                        <thead>
                                                                            <tr style="text-align:center">
                                                                                <th colspan="5" class="table-active"><h4>Wishlist</h4></th>
                                                                            </tr>
                                                                            <tr class="table-active">
                                                                                <th>#</th>
                                                                                <th>Nama Produk</th>
                                                                                <th>Deskripsi</th>
                                                                                <th>Harga</th>
                                                                                <th>Aksi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $no=1; 
                                                                            foreach($wl as $item){ 
                                                                            ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $no++; ?></th>
                                                                                <td><?= $item->namaProduk; ?></td>
                                                                                <td><?= $item->deskripsiProduk; ?></td>
                                                                                <td><?= $item->harga; ?></td>
                                                                                <td>
                                                                                    <a href="<?= site_url('user/delete_wish/'.$item->idWish);?>" nama="<?= $item->namaProduk?>" class="btn btn-danger btn-hapus">Hapus</a>
                                                                                </td>
                                                                            </tr>
                                                                            <?php }?>
                                                                        </tbody>
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
                            </div>
                        </div>