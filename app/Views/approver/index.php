<?= $this->include('layouts/header') ?>

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Pending Approval</h3>
        <h6 class="op-7 mb-2">Lihat reservasi yang belum di approve</h6>
    </div>
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
                if (sizeOf($pendingApprovals) > 0):
                    ?>
                    <table class="table table-bordered table-head-bg-success table-bordered-bd-success">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kendaraan</th>
                                <th>Pengendara</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($pendingApprovals as $approval): ?>
                                <tr>
                                    <td><?= $i++?></td>
                                    <td><?= $approval['name'] ?> | <?= $approval['type'] ?> (<?= $approval['owned'] ?>)</td>
                                    <td><?= $approval['driver'] ?></td>
                                    <td><?= $approval['status'] ?></td>
                                    <td>
                                        <a href="/approver/approve_reservation/<?= $approval['id'] ?>" 
                                            class="btn btn-success">Approve</a>
                                        <a href="/approver/reject_reservation/<?= $approval['id'] ?>"
                                        
                                            class="btn btn-danger">Reject</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
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
            </div>
        </div>
    </div>
</div>
<?= $this->include('layouts/footer') ?>