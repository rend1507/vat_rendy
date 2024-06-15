<?= $this->include('layouts/header') ?>
<a href="<?=base_url('admin/vehicles/tambah')?>" class="btn btn-info">
    Tambah
</a>
<?php if (session()->getFlashdata('message')): ?>
    <div class="my-3 alert alert-info"><?= session()->getFlashdata('message') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="my-3 alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>
<br>
<h1>Managemen Kendaraan</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tipe</th>
        <th>Kepemilikan</th>
        <th></th>
    </tr>
    <?php 
    $i = 1;
    foreach ($vehicles as $vehicle): ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $vehicle['name'] ?></td>
        <td><?= $vehicle['type'] ?></td>
        <td><?= $vehicle['owned'] ?></td>
        <td>
            <a href="<?=base_url('admin/vehicles/edit/'.$vehicle['id'])?>" class="btn btn-info">
                Edit
            </a>

            <a href="<?=base_url('admin/vehicles/delete/'.$vehicle['id'])?>" class="btn btn-danger"  onclick="return confirm('Hapus kendaraan ini? (<?=$vehicle['name']?>)');">
                Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?= $this->include('layouts/footer') ?>
