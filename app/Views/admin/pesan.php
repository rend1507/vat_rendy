<?= $this->include('layouts/header') ?>


<div class="row">
    <div class="col-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">
                        <span>Tambah Reservasi</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('/admin/store_reservation') ?>">
                    <div class="mb-3">
                        <label for="vehicle_id" class="form-label">Kendaraan:</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-select" required>
                            <?php foreach ($vehicles as $vehicle): ?>
                                <option value="<?= $vehicle['id'] ?>"><?= $vehicle['name'] ?> | <?= $vehicle['type'] ?>
                                    (<?= $vehicle['owned'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Pilih kendaraan
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="driver" class="form-label">Pengendara:</label>
                        <input type="text" name="driver" id="driver" class="form-control" required maxlength="75">
                        <div class="invalid-feedback">
                            Masukkan nama pengendara
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="approver_ids" class="form-label">Approvers:</label>
                        <?php foreach ($approvers as $approver): ?>
                            <div class="form-check">
                                <input id="approver_<?= $approver['id'] ?>" class="form-check-input" type="checkbox"
                                    name="approver_ids[]" value="<?= $approver['id'] ?>">
                                <label class="form-check-label" for="approver_<?= $approver['id'] ?>">
                                    <?= $approver['name'] != "" ? $approver['name'] . " (" . $approver['username'] . ")" : $approver['username'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                        <?php if (session()->getFlashdata('error_approver')): ?>
                            <div class="alert alert-danger mt-2"><?= session()->getFlashdata('error_approver') ?></div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="pull-right btn btn-success">
                        Pesan Reservasi
                        <span class="ms-2 btn-label">
                            <i class="fas fa-plus"></i>
                        </span> </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->include('layouts/footer') ?>