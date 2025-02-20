document.addEventListener("DOMContentLoaded", function () {
  "use strict";

  console.log("Script berjalan...");

  /**
   * Scroll event - Tambah class 'scrolled' saat halaman di-scroll
   */
  function toggleScrolled() {
    const body = document.body;
    const header = document.querySelector("#header");

    if (header && (header.classList.contains("scroll-up-sticky") || header.classList.contains("sticky-top") || header.classList.contains("fixed-top"))) {
      window.scrollY > 100 ? body.classList.add("scrolled") : body.classList.remove("scrolled");
    }
  }
  window.addEventListener("scroll", toggleScrolled);

  /**
   * Mobile Nav Toggle
   */
  const mobileNavToggleBtn = document.querySelector(".mobile-nav-toggle");
  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener("click", function () {
      document.body.classList.toggle("mobile-nav-active");
      this.classList.toggle("bi-list");
      this.classList.toggle("bi-x");
    });
  }

  /**
   * Dropdown Menu Fix
   */
  document.querySelectorAll(".dropdown > a").forEach(toggle => {
    toggle.addEventListener("click", function (e) {
      e.preventDefault();
      let parent = this.parentNode;
      let isActive = parent.classList.contains("active");

      // Tutup semua dropdown sebelum membuka yang baru
      document.querySelectorAll(".dropdown").forEach(drop => drop.classList.remove("active"));

      // Jika dropdown yang diklik tidak aktif, aktifkan
      if (!isActive) parent.classList.add("active");
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector("#preloader");
  if (preloader) {
    window.addEventListener("load", () => preloader.remove());
  }

  /**
   * Scroll Top Button
   */
  let scrollTop = document.querySelector(".scroll-top");
  if (scrollTop) {
    function toggleScrollTop() {
      window.scrollY > 100 ? scrollTop.classList.add("active") : scrollTop.classList.remove("active");
    }
    window.addEventListener("scroll", toggleScrollTop);

    scrollTop.addEventListener("click", (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  /**
   * AOS (Animation on Scroll) Initialization
   */
  function aosInit() {
    if (typeof AOS !== "undefined") {
      AOS.init({ duration: 600, easing: "ease-in-out", once: true, mirror: false });
    }
  }
  window.addEventListener("load", aosInit);

  /**
   * GLightbox Initialization
   */
  if (typeof GLightbox !== "undefined") {
    GLightbox({ selector: ".glightbox" });
  }

  /**
   * PureCounter Initialization
   */
  if (typeof PureCounter !== "undefined") {
    new PureCounter();
  }

  /**
   * Isotope Filtering
   */
  document.querySelectorAll(".isotope-layout").forEach(function (isotopeItem) {
    let layout = isotopeItem.getAttribute("data-layout") || "masonry";
    let filter = isotopeItem.getAttribute("data-default-filter") || "*";
    let sort = isotopeItem.getAttribute("data-sort") || "original-order";

    imagesLoaded(isotopeItem.querySelector(".isotope-container"), function () {
      let initIsotope = new Isotope(isotopeItem.querySelector(".isotope-container"), {
        itemSelector: ".isotope-item",
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });

      isotopeItem.querySelectorAll(".isotope-filters li").forEach(function (filters) {
        filters.addEventListener("click", function () {
          let activeFilter = isotopeItem.querySelector(".isotope-filters .filter-active");
          if (activeFilter) activeFilter.classList.remove("filter-active");
          this.classList.add("filter-active");
          initIsotope.arrange({ filter: this.getAttribute("data-filter") });
          aosInit();
        });
      });
    });
  });

  /**
   * Swiper Initialization
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
      let configElement = swiperElement.querySelector(".swiper-config");
      if (!configElement) return;

      let config = JSON.parse(configElement.innerHTML.trim());

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }
  window.addEventListener("load", initSwiper);

  /**
   * Fix URL Hash Scrolling
   */
  window.addEventListener("load", function () {
    if (window.location.hash) {
      let section = document.querySelector(window.location.hash);
      if (section) {
        setTimeout(() => {
          let scrollMarginTop = parseInt(getComputedStyle(section).scrollMarginTop);
          window.scrollTo({ top: section.offsetTop - scrollMarginTop, behavior: "smooth" });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll(".navmenu a");

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;

      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll(".navmenu a.active").forEach(link => link.classList.remove("active"));
        navmenulink.classList.add("active");
      } else {
        navmenulink.classList.remove("active");
      }
    });
  }
  window.addEventListener("scroll", navmenuScrollspy);
});

// main.js

document.addEventListener('DOMContentLoaded', function () {
  const menuProsedur = document.getElementById('menu-prosedur');
  const menuFlowchart = document.getElementById('menu-flowchart');
  const filterApp = document.querySelectorAll('.filter-app');
  const filterProduct = document.querySelectorAll('.filter-product');

  // Fungsi untuk menampilkan dan menyembunyikan filter
  function toggleFilter(filterToShow, filterToHide) {
    filterToShow.forEach(item => item.classList.remove('d-none'));
    filterToHide.forEach(item => item.classList.add('d-none'));
  }

  // Event listener untuk filter menu Prosedur
  menuProsedur.addEventListener('click', function () {
    toggleFilter(filterApp, filterProduct);
  });

  // Event listener untuk filter menu Flowchart
  menuFlowchart.addEventListener('click', function () {
    toggleFilter(filterProduct, filterApp);
  });
});