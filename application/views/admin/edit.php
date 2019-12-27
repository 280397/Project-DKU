<section id="content">

    <section class="container-fluid">
        <!-- Page Content -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $title; ?></h3>

                <hr>
            </div>
            <div class="box-body">
                <?php $this->view('message'); ?>
                <?= form_open_multipart('admin/process') ?>
                <div class="form-group">
                    <label for="sumber">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $row->name; ?>" required="required" autofocus="autofocus">
                    <input type="hidden" value="<?= $row->id ?>" name="id">
                </div>
                <div class="form-group">
                    <label for="sumber">ID</label>
                    <input type="text" class="form-control" id="id_admin" name="id_admin" value="<?= $row->id_admin; ?>" required="required" autofocus="autofocus">
                </div>
                <div class="form-group">
                    <label for="sumber">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $row->username; ?>">
                </div>
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select name="role_id" id="role_id" class="form-control" required="required" autofocus="autofocus">
                        <option value="">--Pilih Role--</option>
                        <?php foreach ($role->result() as $key => $data) { ?>
                        <option value="<?= $data->id ?>" <?= $data->id == $row->role_id ? "selected" : null ?>><?= $data->role ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sumber">Aktif</label>
                    <select name="is_active" id="is_active" class="form-control" required="required" autofocus="autofocus">
                        <?php foreach ($active->result() as $key => $data) { ?>
                        <option value="<?= $data->id ?>" <?= $data->id == $row->is_active ? "selected" : null ?>><?= $data->active ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">

                    <button name="<?= $page ?>" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </section>
</section>
<!-- /.container-fluid -->


<script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    //Date picker

    $(function() {
        $("#datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
        $("#datepicker1").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
        $("#datepicker2").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>