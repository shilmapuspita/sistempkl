<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-user"></i>
                </span> Edit Profil Pengguna
            </h3>
        </div>

        <div class="card shadow-lg">
            <div class="card-body">
                <!-- Alert Jika Ada Error -->
                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Alert Jika Sukses -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <h4 class="card-title text-center text-primary fw-bold">FORMULIR EDIT PROFIL</h4>
                <br>

                <form action="<?= base_url('admin/update-profil') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Username -->
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-circle"></i> Username</label>
                                <input type="text" class="form-control shadow-sm" id="username" name="username"
                                    value="<?= old('username', session('username')) ?>" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label><i class="fa-solid fa-envelope"></i> Email</label>
                                <input type="email" class="form-control shadow-sm" id="email" name="email"
                                    value="<?= old('email', session('email')) ?>" required>
                            </div>

                            <!-- Foto Profil -->
                            <div class="form-group">
                                <label><i class="fa-solid fa-image"></i> Foto Profil</label>
                                <div class="mb-2">
                                    <img src="<?= base_url(session('foto') && session('foto') !== 'default.jpg' ? 'uploads/profile_pictures/' . session('foto') : 'admin/assets/images/default.jpg') ?>"
                                        alt="Foto Profil" class="rounded-circle shadow-sm"
                                        style="width: 70px; height: 70px; object-fit: cover;">
                                </div>
                                <input type="file" class="form-control shadow-sm" id="foto" name="foto">
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan & Batal -->
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm">
                            <i class="fa-solid fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-gradient-secondary shadow-sm">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>