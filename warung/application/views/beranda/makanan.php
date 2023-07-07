

<!-- Produk Home -->
<div class="container-fluid">

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo  base_url('assets/img/slider3.jpg')?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo  base_url('assets/img/slide2.jpg')?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo  base_url('assets/img/slide1.jpg')?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- produk -->
    <div class="row text-center mt-5 center-card">
        <?php foreach ($makanan as $brg): ?>
            <div class="card ml-4 mt-3" style="width: 18rem;">
            <img src="<?php echo base_url(). '/assets/img/' .$brg->gambar ?>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5>
            <small><?php echo $brg->keterangan ?></small><br>
            <span class="badge text-bg-success mb-3">Rp. <?= number_format($brg->harga, 0,',','.')  ?></span><br>
           <?= anchor('beranda/tambah_keranjang/' .$brg->id_brg,'<div class="btn btn-sm btn btn-primary">Tambah Ke Keranjang</div>') ?>

           <?= anchor('beranda/detail/' .$brg->id_brg,'<div class="btn btn-sm btn btn-success">Detail</div>') ?>
            
  </div>
</div>
        <?php endforeach; ?>
    </div>

    
</div>



   

