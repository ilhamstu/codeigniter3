<div class="col-md-12 col-sm-12">
    <form action="<?= base_url('user/detail_pembayaran')?>" method="post">
        <div class="form-group">
        <table class="mb-0 table table-bordered">
            <thead style="text-align:center">
                <th colspan="4" class="table-active"><h4>Checkout</h4></th>
            </thead>
            <tbody>
                <?php
                foreach ($do as $item){?>
                <tr>
                <input type="hidden" name="idDO" value="<?= $item->idDetailOrder?>">
                <input type="hidden" name="sub" value="<?= $item->subtotal?>">
                    <th>Detail Barang</th>
                    <td>: <?= $item->namaProduk;?></td>
                    <td>qty - <?= $item->jumlah?></td>
                    <td><?= "Rp. ".number_format($item->subtotal, 0, ".",".");?></td>
                </tr>
                <tr>
                    <th>Detail Pengiriman</th>
                    <td>: <?= $item->namaKota?></td>
                    <td colspan="2">
                        <select name="krm" class="form-control">
                            <?php foreach($krm as $item){?>
                                <option value="<?= $item->biaya;?>"><?= $item->namaKurir?> - <?= "Rp. ".number_format($item->biaya, 0, ".",".");?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Alamat Lengkap</th>
                    <td colspan="3">
                        <textarea type="text" name="almt" rows="2" cols="100" placeholder="Alamat Lengkap"></textarea>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
        <div class="form-group">
        <button class="btn btn-primary" type="submit">Buat Pesanan</button>
        </div>
    </form>
</div>