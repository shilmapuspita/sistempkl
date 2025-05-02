<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="btn btn-gradient-blue p-2 shadow-sm">
          <i class="fa-solid fa-chalkboard-teacher"></i>
        </span> All Data Mahasiswa Internship
      </h3>
    </div>

    <!-- Notifikasi Flashdata -->
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i>
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation me-2"></i>
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>


    <form method="get" action="<?= base_url('siswa/intern') ?>" class="mb-4">
      <div class="row g-3">
        <div class="col-md-4">
          <label for="no_surat" class="form-label">No Surat</label>
          <input type="number" name="no_surat" id="no_surat" class="form-control"
            placeholder="Cari berdasarkan no surat..." value="<?= esc($_GET['no_surat'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="batch" class="form-label">Batch</label>
          <input type="number" name="batch" id="batch" class="form-control"
            placeholder="Cari berdasarkan batch..." value="<?= esc($_GET['batch'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="tanggal" class="form-label">Tanggal Daftar</label>
          <input type="date" name="tanggal" id="tanggal" class="form-control"
            placeholder="Cari berdasarkan tanggal..." value="<?= esc($_GET['tanggal'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="nama" class="form-label">Nama siswa</label>
          <input type="text" name="nama" id="nama" class="form-control"
            placeholder="Cari berdasarkan nama..." value="<?= esc($_GET['nama'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="lembaga" class="form-label">Lembaga</label>
          <input type="text" name="lembaga" id="lembaga" class="form-control"
            placeholder="Nama lembaga..." value="<?= esc($_GET['lembaga'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="jurusan" class="form-label">Jurusan</label>
          <input type="text" name="jurusan" id="jurusan" class="form-control"
            placeholder="Nama jurusan..." value="<?= esc($_GET['jurusan'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="divisi" class="form-label">Divisi</label>
          <input type="text" name="divisi" id="divisi" class="form-control"
            placeholder="Nama divisi..." value="<?= esc($_GET['divisi'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="bagian" class="form-label">Bagian</label>
          <input type="text" name="bagian" id="bagian" class="form-control"
            placeholder="Nama bagian..." value="<?= esc($_GET['bagian'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="pembimbing" class="form-label">Nama Pembimbing</label>
          <input type="text" name="pembimbing" id="pembimbing" class="form-control"
            placeholder="Nama pembimbing..." value="<?= esc($_GET['pembimbing'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="tgl_awal" class="form-label">Tanggal Mulai</label>
          <input type="date" name="tgl_awal" id="tgl_awal" class="form-control"
            value="<?= esc($_GET['tgl_awal'] ?? '') ?>">
        </div>
        <div class="col-md-4">
          <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
          <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control"
            value="<?= esc($_GET['tgl_akhir'] ?? '') ?>">
        </div>

        <div class="col-md-12 d-flex justify-content-between gap-3 mt-3">
          <button type="submit" class="btn text-white w-50"
            style="background-color: #4A90E2; border-color: #4A90E2; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;"
            onmouseover="this.style.backgroundColor='#357ABD'; this.style.borderColor='#357ABD'; this.style.transform='translateY(-2px)';"
            onmouseout="this.style.backgroundColor='#4A90E2'; this.style.borderColor='#4A90E2'; this.style.transform='translateY(0)';">
            <i class="bi bi-funnel-fill me-2"></i> Set Filter
          </button>

          <a href="<?= base_url('siswa/intern') ?>" class="btn text-white w-50"
            style="background-color: #B0B0B0; border-color: #B0B0B0; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;"
            onmouseover="this.style.backgroundColor='#909090'; this.style.borderColor='#909090'; this.style.transform='translateY(-2px)';"
            onmouseout="this.style.backgroundColor='#B0B0B0'; this.style.borderColor='#B0B0B0'; this.style.transform='translateY(0)';">
            <i class="bi bi-x-circle-fill me-2"></i> Clear Filter
          </a>
        </div>

        <div class="mt-3 mb-4">
          <button type="button" class="btn text-white"
            style="background: linear-gradient(135deg, #1dd1a1, #10ac84); border: none; border-radius: 12px; padding: 12px 20px; font-weight: 600; box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1); transition: all 0.3s ease-in-out;"
            data-bs-toggle="modal" data-bs-target="#exportModal"
            onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.2)'"
            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 14px rgba(0, 0, 0, 0.1)'">
            <i class="bi bi-file-earmark-excel-fill me-2"></i> Export Data
          </button>
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-center text-primary fw-bold">DATA MAHASISWA INTERNSHIP PT INTI</h2>
            <br>

            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="position-relative w-50">
                <input type="text" id="searchInput" class="form-control shadow-sm ps-5 rounded-pill" placeholder="Cari siswa...">
                <i class="fa-solid fa-magnifying-glass position-absolute text-primary"
                  style="left: 15px; top: 50%; transform: translateY(-50%); font-size: 16px;"></i>
              </div>
              <a href="<?= base_url('intern/create') ?>" class="btn btn-gradient-blue btn-sm shadow-sm">
                <i class="fa-solid fa-user-plus"></i> Add Data
              </a>
            </div>
            <div class="table-responsive">
              <table class="table table-hover table-striped table-bordered text-center shadow-sm" id="siswaTable">
                <thead class="bg-primary text-white">
                  <tr>
                    <th>No</th>
                    <th>ID Mahasiswa</th>
                    <th>No. Surat</th>
                    <th>Batch</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Lembaga</th>
                    <th>Jurusan</th>
                    <th>Divisi</th>
                    <th>Bagian</th>
                    <th>Tanggal Awal</th>
                    <th>Tanggal Akhir</th>
                    <th>Status</th>
                    <th>Nama Pembimbing</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                  <?php foreach ($datapmmb as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= esc($row['ID']); ?></td>
                      <td><?= esc($row['NO']); ?></td>
                      <td><?= esc($row['BATCH']); ?></td>
                      <td><?= date('d-m-Y', strtotime($row['TANGGAL'])); ?></td>
                      <td><?= esc($row['NM_SISWA']); ?></td>
                      <td><?= esc($row['LEMBAGA']); ?></td>
                      <td><?= esc($row['JURUSAN']); ?></td>
                      <td><?= esc($row['DIVISI']); ?></td>
                      <td><?= esc($row['BAGIAN']); ?></td>
                      <td><?= date('d-m-Y', strtotime($row['TGL_AWAL'])); ?></td>
                      <td><?= date('d-m-Y', strtotime($row['TGL_AKHIR'])); ?></td>
                      <td><?= esc($row['STATUS']); ?></td>
                      <td><?= esc($row['NAMA_PEMB']); ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('intern/edit/' . $row['ID']) ?>" class="btn btn-gradient-blue btn-sm shadow-sm" data-bs-toggle="tooltip" title="Edit">
                          <i class="bi bi-pencil-square fs-6 align-middle"></i>
                        </a>
                        <a href="<?= base_url('intern/delete/' . $row['ID']) ?>" class="btn btn-gradient-blue btn-sm shadow-sm" data-bs-toggle="tooltip" title="Delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                          <i class="bi bi-trash3-fill fs-6 align-middle"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
              <?= $pager->links() ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById("searchInput").addEventListener("keyup", function() {
    let filter = this.value.toUpperCase();
    let rows = document.querySelector("#siswaTable tbody").rows;

    for (let i = 0; i < rows.length; i++) {
      let txtValue = rows[i].textContent || rows[i].innerText;
      rows[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
    }
  });

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>

<?= view('admin/siswa/intern/ekspor') ?>
<?= $this->endSection() ?>