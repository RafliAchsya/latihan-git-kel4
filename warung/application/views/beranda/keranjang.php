<div class="container-fluid">
    <h4>Keranjang Belanja</h4>

    <table class="table table-bordered tabele-striped table-hover">
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>SUb-Total</th>
        </tr>

        <?php
        $no=1;
        foreach($this->cart->contents() as $items) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $items ['name'] ?></td>
                <td><?= $items ['qty']?></td>
                <td align="right">Rp. <?= number_format($items ['price'],0,',','.')  ?></td>
                <td align="right">Rp. <?= number_format($items ['subtotal'],0,',','.')  ?></td>
            </tr>
        
        <?php endforeach ; ?>
            <tr>
                <td colspan="4"></td>
                <td align="right">Rp. <?= number_format($this->cart->total(),0,',','.')  ?> </td>
            </tr>
    </table>
    <div align ='right'>
        <a href="<?= base_url('beranda/hapus_keranjang') ?>"> <div class="btn btn-danger">Hapus Keranjang</div></a>
        <a href="<?= base_url('beranda/index') ?>"> <div class="btn btn-primary">Lanjut Belanja</div></a>
        <a href="<?= base_url('beranda/Pembayaran') ?>"> <div class="btn btn-success">Pembayaran</div></a>
    </div>
</div>