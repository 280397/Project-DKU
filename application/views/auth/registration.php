<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add User</div>
        <div class="card-body">
        <?php $this->view('message'); ?>
        
        <?= form_open_multipart('admin/adduser') ?>
            
                <div class="form-group"> 
                    <div class="form-row">
                        <div class="col-md-12">
                            <input type="text" id="name" name="name" value="<?= set_value('name'); ?>" class="form-control" placeholder="Full name">
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <input type="text" id="id_admin" name="id_admin" value="<?= set_value('id_admin'); ?>" class="form-control" placeholder="ID">
                            <?= form_error('id_admin', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <input type="text" id="username" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Username">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-md-6">
                            <input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm password">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            
            <div class="text-center">
            </div>
        </div>
    </div>
</div>