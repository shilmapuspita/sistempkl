<form action="<?= base_url('/mentor/upload') ?>" method="post" enctype="multipart/form-data" class="p-4 bg-white shadow rounded">
    <div class="mb-3">
        <label for="file_excel" class="form-label fw-bold">Upload File Excel</label>
        <input class="form-control" type="file" name="file_excel" id="file_excel" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">
        <i class="fas fa-upload"></i> Upload
    </button>
</form>
