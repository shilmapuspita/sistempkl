<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SISTEMPKL</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png'); ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/aos/aos.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

  <!-- Meta Tags (SEO & Responsif) -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Deskripsi website kamu">
  <meta name="keywords" content="PKL, Sistem, Web">
  <meta name="author" content="Nama Kamu">

  <!-- =======================================================
  * Template Name: Butterfly
  * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
  <script src="assets/js/main.js" defer></script>
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/inti.png" width="80px" height="50px" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#portfolio">Informasi</a></li>
          </li>
          <li><a href="/login">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-md-start" data-aos="fade-up">
            <h2>Data Peserta PKL/Riset (Siswa & Mahasiswa)</h2>
            <p>PT. Industri Telekomunikasi Indonesia</p>
            <div class="d-flex mt-4 justify-content-center justify-content-md-start">
              <a href="https://www.inti.co.id/" class="cta-btn" target="_blank" rel="noopener noreferrer">Kunjungi Website Resmi</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section>

    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 position-relative" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/inti1.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-6 ps-lg-4 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <h3>PT INTI (Persero)</h3>
            <p>
            PT INTI (Persero), one of the state-owned enterprises in strategic industries, was officially established on December 30, 1974. The Company headquartered in Jalan Moch Toha No. 77 Bandung has portfolio in the fields of Manufacture, System Integrator, and Digital. To support its business, PT INTI (Persero) also operates an eight hectares production facility on Jalan Moch Toha No 225 which produces telecommunications and electronic devices.
            </p>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-3">

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="190" data-purecounter-duration="1" class="purecounter"></span>
              <p>Mentor</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="617" data-purecounter-duration="1" class="purecounter"></span>
              <p>Collaborating Institutions</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="17179" data-purecounter-duration="1" class="purecounter"></span>
              <p>Siswa/Mahasiswa PKL/Magang</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <br>
    <!-- Clients Section -->
    <section id="clients" class="clients section">
      <h2 style="text-align: center;"><b>Lembaga dengan jumlah peserta PKL terbanyak di PT.INTI</b></h2>
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0 clients-wrap">

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/telkom.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/unpad.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/unikom.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/lpkia.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/smkn4.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/upi.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/polban.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/pasundan.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="section-title-text">Informasi</h2>
        <p class="section-description">
          Banyak institusi pendidikan mewajibkan Praktek Kerja Lapangan (PKL) atau riset sebagai bagian dari kurikulum akademik.
          Sebagai bentuk dukungan, PT. INTI telah membuka kesempatan bagi siswa dan mahasiswa untuk mengembangkan keterampilan mereka di dunia industri.
          Program ini dirancang untuk mengurangi kesenjangan antara teori yang dipelajari di perkuliahan dan realitas di lapangan.
          Untuk memastikan kelancaran proses penerimaan, penempatan, dan pelaksanaan PKL atau riset di PT. INTI serta menjaga reputasi perusahaan,
          diperlukan prosedur yang dapat dijadikan panduan bagi peserta dalam menjalankan kegiatan ini.
        </p>
      </div><!-- End Section Title -->

      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
          <li id="menu-prosedur" class="filter-menu" data-filter=".filter-app">Prosedur Pengajuan PKL/Magang</li>
          |
          <li id="menu-flowchart" class="filter-menu" data-filter=".filter-product">Flowchart</li>
        </ul>

        <div class="d-flex justify-content-center align-items-center flex-column" data-aos="fade-up" data-aos-delay="200">

          <!-- Prosedur Pengajuan PKL/Magang -->
          <div class="portfolio-item isotope-item filter-app d-none">
            <h4 class="portfolio-item-title">Prosedur</h4>
            <p class="portfolio-item-description">Berikut adalah prosedur PKL/Magang</p>
            <img src="assets/img/portfolio/prosedur.png" class="img-fluid" alt="Prosedur">
            <div class="portfolio-info">
              <a href="assets/img/portfolio/prosedur.png" data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
            </div>
          </div><!-- End Portfolio Item -->

          <!-- Flowchart -->
          <div class="portfolio-item isotope-item filter-product d-none">
            <h4 class="portfolio-item-title">Flowchart</h4>
            <p class="portfolio-item-description">Berikut adalah tahapan alur proses PKL/Magang</p>
            <img src="assets/img/portfolio/flowchart.jpg" class="img-fluid" alt="Flowchart">
            <div class="portfolio-info">
              <a href="assets/img/portfolio/flowchart.jpg" data-gallery="portfolio-gallery-product" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
            </div>
          </div><!-- End Portfolio Item -->

        </div><!-- End Portfolio Container -->

      </div>

    </section><!-- /Portfolio Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <img src="assets/img/inti.png" width="70px" height="45px">
          <br><br>
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">PT. Industri Telekomunikasi Indonesia</span>
          </a>
          <div class="social-links d-flex mt-4">
            <a href="https://twitter.com/ptintiofficial" target="_blank"><i class="bi bi-twitter-x"></i></a>
            <a href="https://id-id.facebook.com/ptintiofficial/" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/ptintiofficial/" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCvJlx3RQSaR1j3xGXn3bDaA" target="_blank"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>Jl. Moh. Toha No 77 Bandung 40253,</p>
          <p>Indonesia</p>
          <p class="mt-4"><strong>Tel:</strong> <span>+62-22-5201501</span></p>
          <p><strong>Fax:</strong> <span> +62-22-5202444</span></p>
          <p><strong>Email:</strong> <span>info@inti.co.id</span></p>
        </div>

        <div class="col-lg-4 col-md-12 footer-map">
          <h4>Our Location</h4>
          <div class="ratio ratio-16x9">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.899355913216!2d107.60497827508406!3d-6.913622367582785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e98c7aa5c30d%3A0x3cb1b4ff0982e4f8!2sPT%20Industri%20Telekomunikasi%20Indonesia%20(INTI)!5e0!3m2!1sid!2sid!4v1707929000000"
              class="rounded shadow-sm"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>


      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <div class="credits">
        PT INTI TEAM
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>