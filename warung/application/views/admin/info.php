<div class="container-fluid">
    <h4 class="text-center mb-5" style="margin-top: 100px;">Info Pemesanan</h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id Info</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($info as $inv): ?>
        <tr>
            <td><?= $inv->id ?></td>
            <td><?= $inv->nama ?></td>
            <td><?= $inv->alamat ?></td>
            <td><?= $inv->tgl_pesan ?></td>
            <td><?= $inv->batas_bayar ?></td>
            <td><?= anchor('info/detail/'. $inv->id, '<div class="btn btn-primary">Detail</div>') ?></td>
        </tr>
        <?php endforeach;?>

    </table>
</div>