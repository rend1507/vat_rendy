<?= $this->include('layouts/header') ?>
<?php
$isUpdate = isset($vehicle)
?>

<h1><?= $isUpdate ? 'Edit Kendaraan ' : 'Tambah Kendaraan' ?></h1>

    <form action="<?= $isUpdate ? base_url('admin/vehicles/update/' . $vehicle['id']) : base_url('admin/vehicles/create') ?>" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="name">Nama Kendaraan:</label>
            <input type="text" id="name" name="name" value="<?= $isUpdate ? $vehicle['name'] : '' ?>" required>
        </div>

        <div>
            <label for="type">Tipe:</label>
            <select id="type" name="type" required>
                <option value="person" <?= $isUpdate && $vehicle['type'] == 'person' ? 'selected' : '' ?>>Angkut Orang</option>
                <option value="goods" <?= $isUpdate && $vehicle['type'] == 'goods' ? 'selected' : '' ?>>Angkut Barang</option>
            </select>
        </div>

        <div>
            <label for="owned">Kepemilikan:</label>
            <select id="owned" name="owned" required>
                <option value="company" <?= $isUpdate && $vehicle['owned'] == 'company' ? 'selected' : '' ?>>Company</option>
                <option value="rental" <?= $isUpdate && $vehicle['owned'] == 'rental' ? 'selected' : '' ?>>Rental</option>
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-<?= $isUpdate ? 'warning' : 'success' ?>"><?= $isUpdate ? 'Update' : 'Tambah' ?> Kendaraan</button>
        </div>
    </form>
<?= $this->include('layouts/footer') ?>
