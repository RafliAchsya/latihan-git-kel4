<div class="container-fluid" style="margin-top: 100px;">

    <button class="d-grid gap-2 col-3 mx-auto btn btn-sm btn-primary p-2 mb-3 " data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm">Tambah Barang</i></button>


    <table>
        <tr>
            <th>NO</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="3">Aksi</th>
        </tr>

        <?php
        $no=1;
        foreach($barang as $brg) : ?>
        <tr>
            <th><?= $no++ ?></th>
            <th><?= $brg->nama_brg ?></th>
            <th><?= $brg->keterangan ?></th>
            <th><?= $brg->kategori ?></th>
            <th><?= $brg->harga ?></th>
            <th><?= $brg->stok ?></th>
           
            <td><?= anchor('data_barang/edit/'. $brg->id_brg,'<div class="btn btn-primary m-2"><i class="fa fa-edit"></i></div>') ?></td>
            <td><?= anchor('data_barang/hapus/'. $brg->id_brg,'<div class="btn btn-danger m-2"><i class="fa fa-trash"></i></div>') ?></td>
           
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body m-auto">
       <form action="<?= base_url(). 'data_barang/tambah_aksi';?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" name="nama_brg" class="form-control">
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control">
    </div>
    <div class="form-group">
        <label>Kategori</label>
       <select class="form-control" name="kategori">
        <option>sembako</option>
        <option>makanan</option>
        <option>minuman</option>
       </select>
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" class="form-control">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="text" name="stok" class="form-control">
    </div>
    <div class="form-group">
        <label>Gambar produk</label><br>
        <input type="file" name="gambar" class="form-control">
    </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>