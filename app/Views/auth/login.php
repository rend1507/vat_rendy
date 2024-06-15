<?= $this->include('layouts/header') ?>
<div class="main-panel w-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form action="/login" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center mb-0">Login</h2>
                        </div>
                        <div class="card-body">
                            <!-- Pesan kesalahan -->
                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible mt-3">
                                    <?= session()->getFlashdata('error') ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <!-- Username -->
                            <div class="form-group mb-0">
                                <label for="username">Username</label>
                                <input id="username" type="text" name="username" class="form-control"
                                    placeholder="Username" required>
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-0">
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" class="form-control"
                                    placeholder="Password" required>
                            </div>


                            <div class="form-group mb-0 pull-right">
                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= $this->include('layouts/footer-content') ?>
</div>
<?= $this->include('layouts/footer') ?>