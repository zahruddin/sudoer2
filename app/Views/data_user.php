<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- Tabel untuk menampilkan data pengguna -->
<h2>Data Pengguna</h2>
<?php
$successMessage = session()->getFlashdata('success');
if ($successMessage) :
?>
  <div class="alert alert-success">
    <?= esc($successMessage) ?>
  </div>
<?php endif; ?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  + Tambah User
</button>

<table class="table table-bordered mt-2">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <!-- Isi tabel dengan data pengguna -->
    <?php foreach ($users as $user) : ?>
      <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['username'] ?></td>
        <td><?= $user['email'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>

</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Example</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form -->
        <form action="/datauser/add" method="post">
          <!-- Tambahkan CSRF Token -->
          <?= csrf_field() ?>
          <div class="mb-3">
            <label for="InputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="InputUsername" name="username" required>
          </div>
          <div class="mb-3">
            <label for="InputPassword" class="form-label">Password</label>
            <input type="text" class="form-control" id="InputPassword" name="password" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail" name="email" required>
          </div>
          <!-- Tambahkan kolom lain yang diperlukan -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
