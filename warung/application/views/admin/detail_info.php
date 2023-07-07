<div class="container-fluid" style="margin-top: 100px;">
    <h4>Detail Pesanan <div class="btn btn-success">No. Info: <?= $info->id ?></div></h4>

    <table class="table table-bordered table-hover table-striped">

    <tr>
        <th>Id Produk</th>
        <th>Nama Produk</th>
        <th>Jumlah Pesanan</th>
        <th>Harga Satuan</th>
        <th>Sub-Total</th>
    </tr>

    <?php
    $total = 0;
    foreach ($pesanan as $psn) :
        $subtotal = $psn->jumlah * $psn->harga;
        $total += $subtotal;
    ?>

    <tr>
        <td><?= $psn->id_brg ?></td>
        <td><?= $psn->nama_brg ?></td>
        <td><?= $psn->jumlah ?></td>
        <td><?= number_format($psn->harga,0,',','.') ?></td>
        <td><?= number_format($subtotal,0,',','.') ?></td>
    </tr>

    <?php endforeach; ?>

    <td colspan="4" align="right">
        Grand Total
    </td>
    <td align="right">Rp. <?= number_format($total,0,',','.') ?></td>

    </table>

    <a href="<?= base_url('info/index')?>"><div class="btn btn-primary">Kembali</div></a>

</div>