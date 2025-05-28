<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SISTEMPKL Admin</title>
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/ti-icons/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/style.css') ?>">
  <link rel="shortcut icon" href="<?= base_url('admin/assets/images/favicon.png') ?>" />
  <style>
    body {
      background: linear-gradient(135deg, #00509E, #1B98E0) !important;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }

    .login-container {
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 100%;
      max-width: 400px;
    }

    .login-container img {
      width: 120px;
      margin-bottom: 20px;
    }

    .login-container h4 {
      margin-bottom: 10px;
      color: #333;
    }

    .login-container input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .login-container button {
      width: 100%;
      padding: 12px;
      background: linear-gradient(to right, #003366, #f5fbff);
      border: none;
      border-radius: 6px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-container button:hover {
      background: linear-gradient(135deg, #00509E, #007BFF) !important;
    }

    .login-container button {
      background: linear-gradient(135deg, #1B98E0, #00509E) !important;
    }

    .login-container a {
      display: block;
      margin-top: 10px;
      color: #f5fbff, #003366;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <img src="<?= base_url('assets/img/inti.png') ?>" alt="Logo">
    <h4>Haloo! Let's Start Today with Bismillah</h4>
    <h6>⋆˚ Sign In for Start the Dayyy! ♡</h6>
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <br>
    <form action="<?= base_url('/login') ?>" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">SIGN IN</button>
    </form>
    </div>
</body>
</html>