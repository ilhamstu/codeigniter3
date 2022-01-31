<div class="col-md-12 col-sm-12">
    <form action="<?= base_url('user/masuk_keranjang')?>" method="post">
        <table class="mb-0 table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Kota Pengiriman</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php foreach ($produk as $item){?>
                        <input type="hidden" name="idP" value="<?= $item->idProduk;?>">
                        <input type="hidden" name="harga" value="<?= $item->harga;?>">
                        <?= $item->namaProduk; 
                        }?>
                    </td>
                    <td>
                        <?php
                        foreach ($order as $item){?>
                        <input type="hidden" name="idO" value="<?= $item->idOrder?>">
                        <?php }?>
                        <input type="number" name="jumlah" min="1" max="100" step="1" placeholder="1">
                    </td>
                    <td>
                        <select name="kota" class="form-control">
                            <?php foreach($kota as $item){?>
                                <option value="<?= $item->idKota;?>"><?= $item->namaKota?></option>
                            <?php }?>
                        </select>
                    </td>
                    <td><button class="btn btn-primary" type="submit">Tambah Keranjang</button></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

    <!-- <table class="mb-0 table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><input type="hidden" value="<?= $produk->idProduk;?>"><?= $produk->namaProduk; ?></td>
                                        <td>
                                            <input type="hidden" value="<?= $order->idOrder?>">
                                            <input type="number" name="jumlah" min="1" max="100" step="1">
                                        </td>
                                        <td>
                                        <a href="<?= site_url('produk/edit_iklan/'.$item->idIklan);?>" class=" btn btn-warning btn-edit">Edit</a>
                                        <a href="<?= site_url('produk/delete_iklan/'.$item->idIklan);?>" nama="<?= $item->namaProduk?>" class="btn btn-danger btn-hapus">Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> -->