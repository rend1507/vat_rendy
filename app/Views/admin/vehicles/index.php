<?= $this->include('layouts/header') ?>

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Kendaraan</h3>
        <h6 class="op-7 mb-2">Lihat daftar kendaraan</h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">

        <a href="<?= base_url('admin/vehicles/tambah') ?>" class="btn btn-primary btn-round">
            Tambah Kendaraan
            <span class="ms-2 btn-label">
                <i class="fas fa-plus"></i>
            </span>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <?php if (session()->getFlashdata('message')): ?>
            <div class="my-3 alert alert-info alert-dismissible"><?= session()->getFlashdata('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="my-3 alert alert-danger alert-dismissible"><?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row col-12">
    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-info"><?= session()->getFlashdata('message') ?></div>
    <?php endif; ?>
</div>


<div class="row">
    <div class="col-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">
                        <span>Managemen Kendaraan</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Kepemilikan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($vehicles as $vehicle): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $vehicle['name'] ?></td>
                                <td><?= $vehicle['type'] ?></td>
                                <td><?= $vehicle['owned'] ?></td>
                                <td class="d-flex justify-content-between">
                                    <a href="<?= base_url('admin/vehicles/edit/' . $vehicle['id']) ?>"
                                        class="btn btn-info w-50 mx-2">
                                        Edit
                                    </a>

                                    <a href="<?= base_url('admin/vehicles/delete/' . $vehicle['id']) ?>"
                                        class="btn btn-danger w-50 mx-2"
                                        onclick="return confirm('Hapus kendaraan ini? (<?= $vehicle['name'] ?>)');">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->include('layouts/footer') ?>