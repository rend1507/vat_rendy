<?= $this->include('layouts/header') ?>

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Daftar Approval</h3>
        <h6 class="op-7 mb-2">Lihat request approval terdahulu</h6>
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
                    <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Kendaraan</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Request</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $reservation['name'] ?> - <?= ucfirst($reservation['type']) ?>
                                        (<?= $reservation['owned'] ?>)
                                    </td>
                                    <td><?= $reservation['driver'] ?></td>
                                    <td><?= $reservation['status'] ?></td>
                                    <td><?= $reservation['created_at'] ?></td>
                                    <td>
                                        <a href="/approver/approve_reservation/<?= $reservation['id'] ?>"
                                            class="btn btn-success <?= $reservation['status'] == 'approved' ? 'disabled' : '' ?>">Approve</a>
                                        <a href="/approver/reject_reservation/<?= $reservation['id'] ?>"
                                            class="btn btn-danger <?= $reservation['status'] == 'rejected' ? 'disabled' : '' ?>">Reject</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                else:
                    ?>
                    <div class="container">
                        <div class="card bg-info text-white my-3">
                            <h1 class="text-center mb-0">Masih Kosong, silahkan tunggu admin menambah</h1>
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