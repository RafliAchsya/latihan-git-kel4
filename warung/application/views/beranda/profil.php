<div class="container">
    <h1 class="text-center mb-4">My Profile</h1>
    <div class="card shadow-lg mb-3 m-auto" style="max-width: 540px;">
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
</div>