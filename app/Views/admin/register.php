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

  <style>
    body {
      background: linear-gradient(135deg, #00509E, #1B98E0) !important;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Poppins, sans-serif;
    }

    .register-container {
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 100%;
      max-width: 400px;
    }

    .register-container img {
      width: 120px;
      margin-bottom: 20px;
    }

    .register-container h4 {
      margin-bottom: 10px;
      color: #333;
    }

    .register-container input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .register-container button {
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #1B98E0, #00509E) !important;
      border: none;
      border-radius: 6px;
      color: white;
      font-size: 16px;
      font-family: Poppins, sans-serif;
      cursor: pointer;
      transition: 0.3s;
    }

    .register-container button:hover {
      background: linear-gradient(135deg, #00509E, #007BFF) !important;
    }

    .register-container a {
      display: block;
      margin-top: 10px;
      color: #003366;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="register-container">
    <<img src="<?= base_url('assets/img/inti.png') ?>" alt="Logo">
      <h4>Welcome! Let's Create an Account</h4>
      <h6>𐙚˚ Start your journey now!</h6>
      <br>
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger text-start">
          <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
              <li><?= esc($error) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>


      <form action="<?= base_url('admin/register') ?>" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">REGISTER</button>
      </form>
      <br>
      <div class="text-center mt-4">
        <span class="d-inline-flex align-items-baseline">
          Already have an account?
          <a href="<?= base_url('/login') ?>" class="text-primary fw-bold ms-1"
            style="text-decoration: none; border-bottom: 1px solid currentColor;">
            Login
          </a>
        </span>
      </div>

  </div>

  </div>
</body>

</html>