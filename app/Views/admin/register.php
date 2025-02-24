<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SISTEMPKL Admin - Register</title>
    
    <!-- Plugins: CSS -->
    <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
    
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('admin/assets/css/style.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('admin/assets/images/favicon.png') ?>" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?= base_url('assets/img/inti.png') ?>">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                <!-- Menampilkan pesan error jika ada -->
                <?php if (session()->has('errors')): ?>
                    <div style="color: red;">
                        <ul>
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('success')): ?>
                    <div style="color: green;">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>

                <form class="pt-3" action="<?= base_url('admin/register') ?>" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? 
                    <a href="<?= base_url('/login') ?>" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Plugins: JS -->
    <script src="<?= base_url('admin/assets/vendors/js/vendor.bundle.base.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/off-canvas.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/misc.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/settings.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/todolist.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/jquery.cookie.js') ?>"></script>
  </body>
</html>