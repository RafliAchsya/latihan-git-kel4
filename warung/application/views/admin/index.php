<div class="container text-center mb-3 mt-5">
    <h1 style="margin-top: 150px;">Selamat Datang Admin <?= $user['name'] ?></h1>
</div>
<div class="card shadow-lg mb-5 m-auto mt-5" style="max-width: 540px;">
  <div class="row g-0  ">
    <div class="col-md-4">
      <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $user['name']; ?></h5>
        <p class="card-text"><?= $user['email']; ?></p>
        <p class="card-text"><small class="text-body-secondary">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
      </div>
    </div>
  </div>
</div>