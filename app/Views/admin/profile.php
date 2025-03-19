<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-user"></i>
                </span> Profil Pengguna
            </h3>
        </div>
        <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="card-title text-center text-primary fw-bold">PROFIL ADMIN</h4>
                <br>

                <div class="row">
                    <div class="col-md-4 text-center">
                        <!-- Foto Profil -->
                        <img src="<?= base_url(!empty(session('foto')) && session('foto') !== 'default.jpg'
                                        ? 'uploads/profile_pictures/' . session('foto')
                                        : 'admin/assets/images/default.jpg') ?>"
                            alt="Foto Profil" class="rounded-circle shadow-sm"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    </div>

                    <div class="col-md-8">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fa-solid fa-user-circle"></i> <strong>Username: </strong> <?= esc(session('username')) ?>
                            </li>
                            <li class="list-group-item">
                                <i class="fa-solid fa-envelope"></i> <strong>Email: </strong> <?= esc(session('email')) ?>
                            </li>
                        </ul>

                        <!-- Tombol Edit Profil -->
                        <div class="mt-4">
                            <a href="<?= base_url('admin/edit_profile') ?>" class="btn btn-gradient-blue shadow-sm">
                                <i class="fa-solid fa-user-pen"></i> Edit Profil
                            </a>
                            <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-gradient-secondary shadow-sm">
                                <i class="fa-solid fa-arrow-left"></i> Kembali
                            </a>
                        </div>

                        <!-- Debugging: Cek Isi Session
                        <pre><?php print_r(session()->get()); ?></pre> -->

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>