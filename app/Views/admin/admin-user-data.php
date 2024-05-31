<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<!-- Isi dashboard -->
<div class="table-responsive">
  <div class="text-right mb-3">
    <div class="container-fluid d-flex justify-content-between align-items-center mb-3">
      <form class="form-check m-2" role="search">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="padding: 15px; width: 700px" />
      </form>
    </div>
  </div>
  <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="card-body">
      <div class="alert alert-success" role="alert" style="color: green;">
        <?= esc(session()->getFlashdata('pesan')) ?>
      </div>
    </div>
  <?php endif; ?>
  <table class="table table-hover table-striped">
    <thead class="text-center" style="background-color: #487baa; color: #fff">
      <tr>
        <th>No</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php foreach ($user as $index => $u) : ?>
        <tr>
          <td><?= $index + 1; ?></td>
          <td><?= $u['nama_lengkap']; ?></td>
          <td><?= $u['username']; ?></td>
          <td><?= $u['email']; ?></td>
          <td>
            <a href="edit_user/<?= $u['id_user']; ?>">
              <button style="
                        background-color: #487baa;
                        color: white;
                        border: none;
                      ">
                Edit
              </button>
            </a>
            <a href="delete_user/">
              <button style="background-color: red; color: white; border: none">
                Delete
              </button>
            </a>
          </td>
        </tr>
      <?php endforeach ?>
      <!-- Tambahkan baris tambahan sesuai kebutuhan -->
    </tbody>
  </table>
</div>
<?php $this->endSection(); ?>