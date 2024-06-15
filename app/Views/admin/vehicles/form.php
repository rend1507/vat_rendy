<?= $this->include('layouts/header') ?>
<?php
$isUpdate = isset($vehicle)
    ?>


<div class="row">
    <div class="col-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">
                        <span><?= $isUpdate ? 'Edit Kendaraan ' : 'Tambah Kendaraan' ?></span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="<?= $isUpdate ? base_url('admin/vehicles/update/' . $vehicle['id']) : base_url('admin/vehicles/create') ?>"
                    method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kendaraan:</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="<?= $isUpdate ? $vehicle['name'] : '' ?>" required>
                        <div class="invalid-feedback">
                            Nama kendaraan diperlukan.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Tipe:</label>
                        <select id="type" name="type" class="form-select" required>
                            <option value="person" <?= $isUpdate && $vehicle['type'] == 'person' ? 'selected' : '' ?>>
                                Angkut Orang</option>
                            <option value="goods" <?= $isUpdate && $vehicle['type'] == 'goods' ? 'selected' : '' ?>>Angkut
                                Barang</option>
                        </select>
                        <div class="invalid-feedback">
                            Tipe kendaraan diperlukan.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="owned" class="form-label">Kepemilikan:</label>
                        <select id="owned" name="owned" class="form-select" required>
                            <option value="company" <?= $isUpdate && $vehicle['owned'] == 'company' ? 'selected' : '' ?>>
                                Company</option>
                            <option value="rental" <?= $isUpdate && $vehicle['owned'] == 'rental' ? 'selected' : '' ?>>
                                Rental</option>
                        </select>
                        <div class="invalid-feedback">
                            Kepemilikan kendaraan diperlukan.
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit"
                            class="pull-right btn btn-<?= $isUpdate ? 'warning' : 'success' ?>"><?= $isUpdate ? 'Update' : 'Tambah' ?>
                            Kendaraan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>