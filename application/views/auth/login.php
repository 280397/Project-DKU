<div class="container">

    <div class="row">

        <div class="col-lg-12">


            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center">
                    <h3><?= $title; ?></h3>
                </div>
                <div class="card-body">

                    <?= $this->session->flashdata('message'); ?>

                    <form method="post" action="<?= base_url('auth'); ?>">
                        <div class="form-group">
                            <input type="text" id="email" name="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Email">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button class="btn btn-primary btn-block" href="index.html">Login</button>
                    </form>
                    <div class="text-center">
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>



</div>