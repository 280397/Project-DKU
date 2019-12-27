<div id="content">

    <div class="container-fluid">
        <!-- Page Content -->
        <h3><?= $title; ?></h3>
        <hr>


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                <?= $title; ?></div>
            <div class="card-body">
                <?= $this->session->flashdata('notif'); ?>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#Import"><i class="fas fa-plus"></i> Import</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">No PB / Nota</th>
                                <th scope="col">Awal</th>
                                <th scope="col">Masuk</th>
                                <th scope="col">Keluar</th>
                                <th scope="col">Sisa</th>
                                <th scope="col">Devisi</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <th scope="row" style="width:5%;"><?= $i; ?></th>
                                    <td><?= $data->name_type_segels ?> </td>
                                    <td><?= $data->tgl ?></td>
                                    <td><?= $data->no_pb_nota ?></td>
                                    <td><?= $data->awal ?></td>
                                    <td><?= $data->masuk ?></td>
                                    <td><?= $data->keluar ?></td>
                                    <td><?= $data->sisa ?></td>
                                    <td><?= $data->devisi ?></td>
                                    <td><?= $data->keterangan ?></td>

                                </tr>
                                <?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Edit Menu -->
        <div class=" modal fade" id="Import" tabindex="-1" role="dialog" aria-labelledby="Import" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Import"><?= $title ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>Segel/saveimport" method="post" enctype="multipart/form-data" id="import_form">
                        <div class="modal-body">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" required accept=".xls, .xlsx">
                                <label for="file" class="custom-file-label">Choose file</label>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="import" value="Import" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>