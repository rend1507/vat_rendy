<?= $this->include('layouts/header') ?>
<h1>Yang perlu di Approve</h1>
<?php
if(sizeOf($pendingApprovals) > 0):
?>
<table>
    <tr>
        <th>ID</th>
        <th>Vehicle</th>
        <th>Driver</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($pendingApprovals as $approval): ?>
    <tr>
        <td><?= $approval['id'] ?></td>
        <td><?= $approval['vehicle_id'] ?></td>
        <td><?= $approval['driver'] ?></td>
        <td>
            <a href="/approver/approve_reservation/<?= $approval['id'] ?>">Approve</a>
            <a href="/approver/reject_reservation/<?= $approval['id'] ?>">Reject</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php
else:
?>
<div class="container">
    <div class="card bg-info text-white mx-auto">
        <h1 class="text-center mb-0">Masih Kosong, tunggu Admin memasukkan data</h1>
    </div>
</div>
<?php
endif;
?>
<?= $this->include('layouts/footer') ?>
