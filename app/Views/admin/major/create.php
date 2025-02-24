<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> ADD DATA MAJOR
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title"></h4>
                        <p class="card-description"> Basic form elements </p> -->
                        <form class="forms-sample" action="<?= base_url('major/store')?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Jurusan</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="NAMA_JURUSAN" placeholder="Nama Jurusan">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light" href="<?= base_url('/major'); ?>">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
        </div>

        <!-- main-panel ends -->
        <?= $this->endSection() ?>