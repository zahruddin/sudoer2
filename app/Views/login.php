<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mt-5">Login</h2>
            <!-- Form login dengan mx-auto -->
            <form method="post" action="/login/authenticate" class="mx-auto">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-2">Login</button>
            </form>
            <a href="/" class="btn btn-outline-secondary mt-2">kembali ke halaman utama</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
