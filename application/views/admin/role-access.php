<div id="content">

    <div class="container-fluid">
        <!-- Page Content -->
        <h3><?= $title; ?></h3>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                <?= $title; ?> : <?= $role['role']; ?>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper ">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Access</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $m['menu']; ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']) ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>