<?= $this->include('layouts/header') ?>

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>
        <h6 class="op-7 mb-2">Lihat rangkuman reservasi kendaraan</h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">

        <a href="<?= base_url('admin/pesan') ?>" class="btn btn-primary btn-round"> 
            Tambah Reservasi
            <span class="ms-2 btn-label">
                <i class="fas fa-plus"></i>
            </span>   
        </a>
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
                        <span>Status Approval Kendaraan</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php
                if (sizeOf($reservations) > 0):
                    ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Vehicle</th>
                            <th>Driver</th>
                            <th>Status</th>
                            <th>Requested at</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($reservations as $reservation): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $reservation['name'] ?> - <?= $reservation['type'] ?> (<?= $reservation['owned'] ?>)
                                </td>
                                <td><?= $reservation['driver'] ?></td>
                                <td><?= $reservation['status'] ?></td>
                                <td><?= $reservation['created_at'] ?></td>
                                <td>
                                    <a href="/admin/remove_reservation/<?= $reservation['id'] ?>" class="btn btn-danger"
                                        onclick="return confirm('Batalkan reservasi ini?');">Batalkan</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php
                else:
                    ?>
                    <div class="container">
                        <div class="card bg-info text-white my-3">
                            <h1 class="text-center mb-0">Masih Kosong, silahkan tambah</h1>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>