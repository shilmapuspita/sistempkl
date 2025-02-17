<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Sistem PKL') ?></title>

    <!-- Link ke CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>

    <!-- Bagian Header -->
    <?= $this->include('partials/header') ?>

    <!-- Bagian Konten Dinamis -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Bagian Footer -->
    <?= $this->include('partials/footer') ?>

    <!-- Link ke JS -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>