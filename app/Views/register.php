<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<header class="text-center mt-5">
    <h1>Registrasi</h1>
</header>

<main class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="/register/process" class="needs-validation" novalidate>
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <div class="invalid-feedback">
                        Harap masukkan username.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="invalid-feedback">
                        Harap masukkan password.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">
                        Harap masukkan email yang valid.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>
</main>

<footer class="text-center mt-3">
    <p>Sudah punya akun? <a href="/login">Masuk</a></p>
</footer>
<?= $this->endSection() ?>
