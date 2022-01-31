    <div class="col-md-12 col-sm-12">
        <table class="mb-0 table table-bordered">
            <thead style="text-align:center">
                <th colspan="4" class="table-active"><h4>Detail Order</h4></th>
            </thead>
            <tbody>
                <tr>
                    <th>Detail Barang</th>
                    <td>: <?= $do->namaProduk;?></td>
                    <td>qty - <?= $do->jumlah?></td>
                    <td><?= "Rp. ".number_format($do->subtotal, 0, ".",".");?></td>
                </tr>
                <tr>
                    <th>Detail Pengiriman</th>
                    <td>: <?= $do->almt?></td>
                    <td colspan="2">Kota <?= $do->namaKota?></td>
                </tr>
                <tr style="text-align:center" class="table-warning">
                    <td colspan="3" text-align="center">Total Bayar</td>
                    <td><?= "Rp. ".number_format($bayar->total, 0, ".",".");?></td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="4">Transfer dengan nominal diatas ke nomor Rekening dibawah ini :</td>
                </tr>
                <tr>
                    <td>BRI</td>
                    <td>:</td>
                    <td colspan="2">0324032428025</td>
                </tr>
                <tr>
                    <td>BNI</td>
                    <td>:</td>
                    <td colspan="2">042943028423</td>
                </tr>
                <tr>
                    <td>BCA</td>
                    <td>:</td>
                    <td colspan="2">32403274</td>
                </tr>
            </tbody>
        </table>
    </div>