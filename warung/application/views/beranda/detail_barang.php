<div class="container-fluid">
<div class="card">
  <div class="card-header">
    Detail Produk
  </div>
  <div class="card-body">

  <?php foreach($barang as $brg) : ?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?= base_url(). '/assets/img/'. $brg->gambar ?>" class="card-img-top">
        </div>
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>Nama Produk</td>
                    <td><strong><?= $brg->nama_brg ?></strong></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><strong><?= $brg->keterangan ?></strong></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td><strong><?= $brg->kategori ?></strong></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><strong><?= $brg->stok ?></strong></td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td><strong><div class="btn btn-success">Rp .<?= number_format($brg->harga,0,',','.')  ?></strong></div></td>
                </tr>
            </table>
            <?= anchor('beranda/tambah_keranjang/' .$brg->id_brg,'<div class="btn btn-sm btn btn-primary">Tambah Ke Keranjang</div>') ?>
            <?= anchor('beranda/index/' ,'<div class="btn btn-sm btn btn-danger">Kembali</div>') ?>
        </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
</div>