<div id="content">

    <div class="container-fluid">
        <!-- Page Content -->
        <h3><?= $title; ?></h3>
        <hr>

        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="card mb-3 col-lg-6">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <!-- <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img"><br> -->

                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['name']; ?></h5>
                        <p class="card-text"><?= $user['email'] ?></p>
                        <!-- <p class="card-text"><small class="text-mutted">Member since <?= date('d F Y', $user['date_created']); ?></small></p> -->
                    </div>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <a href="<?= base_url('user/edit/') ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-user-edit"></i> Edit Profile</a>
                    <a href="<?= base_url('user/changepassword/') ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-key"></i> Change Password</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->