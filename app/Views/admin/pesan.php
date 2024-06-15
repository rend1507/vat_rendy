<?= $this->include('layouts/header') ?>
<h1>Reservasi</h1>
<form method="post" action="/admin/store_reservation">
    <label for="vehicle_id">Vehicle:</label>
    <select name="vehicle_id">
        <?php foreach ($vehicles as $vehicle): ?>
        <option value="<?= $vehicle['id'] ?>"><?= $vehicle['name'] ?> | <?= $vehicle['type'] ?> (<?= $vehicle['owned'] ?>)</option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="driver">Driver:</label>
    <input type="text" name="driver" required maxlength="75">
    <br>
    <label for="approver_ids">Approvers:</label>
    <?php foreach ($approvers as $approver): ?>
        <div>
            <input type="checkbox" name="approver_ids[]" value="<?= $approver['id'] ?>">
            <label><?= $approver['name'] != "" ? $approver['name'] . " (".$approver['username'].")" : $approver['username'] ?></label>
        </div>
    <?php endforeach; ?>
    <?php if (session()->getFlashdata('error_approver')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error_approver') ?></div>
    <?php endif; ?>
    <br>
    <button type="submit" class="btn btn-success">Pesan Reservasi</button>
</form>
<?= $this->include('layouts/footer') ?>
