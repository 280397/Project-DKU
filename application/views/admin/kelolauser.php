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
                <?= $this->session->flashdata('messageuser'); ?>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#UserModal"><i class="fas fa-plus"></i> Tambah Admin</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <!-- <th scope="col">ID</th> -->
                                <th scope="col">No Hp</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Join Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <th scope="row" style="width:5%;"><?= $i; ?></th>
                                    <td><?= $data->name ?>
                                    </td>

                                    <td><?= $data->no_hp ?></td>
                                    <td><?= $data->id_position ?></td>
                                    <td><?= $data->id_location ?></td>
                                    <td><?= $data->created_at ?></td>
                                    <td><?= $data->tipe ?></td>
                                    <!-- <td><?= $data->active ?></td> -->
                                    <td>
                                        <a class="btn btn-small btn-primary" data-target="<?= $data->id ?>" href="<?= base_url('Admin/edit/' . $data->id) ?>"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-small btn-danger" href="<?= base_url('Admin/hapususer/' . $data->id) ?>" onclick="return confirm ('Yakin hapus?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- start modal -->
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                        <!-- <h5 class="modal-title" v-show="editmode" id="exampleModalLabel">Update Data</h5> -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Admin/process'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="hidden" name="id">
                                    <input type="text" class="form-control" id="Email" name="Email" placeholder="Masukkan Email" required="required" autofocus="autofocus">

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <input v-model="form.name" required="" type="text" name="name" placeholder="Nama" class="form-control">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>

                            <div class="form row">
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input v-model="form.password" type="password" name="password" placeholder="Password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                    <has-error :form="form" field="password"></has-error>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nomor HP</label>
                                    <input v-model="form.no_hp" required="" type="text" name="no_hp" placeholder="Nomor HP" class="form-control" :class="{ 'is-invalid': form.errors.has('no_hp') }">
                                    <has-error :form="form" field="no_hp"></has-error>
                                </div>
                            </div>

                            <div class="form row">
                                <div class="form-group col-md-6">
                                    <label>Lokasi</label>
                                    <select name="id_location" required="" id="id_location" v-model="form.id_location" class="form-control" :class="{'is-invalid': form.errors.has('id_location')}">
                                        <option value="">Pilih Lokasi</option>
                                        <option v-for="location in locations" :value="location.id_location" :key="location.value">
                                            {{ location.location }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="id_location"></has-error>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Jabatan</label>
                                    <select name="id_position" required="" id="id_position" v-model="form.id_position" class="form-control" :class="{'is-invalid': form.errors.has('id_position')}">
                                        <option value="">Pilih Jabatan</option>
                                        <option v-for="position in positions" :value="position.id_position" :key="position.value">
                                            {{ position.position }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="id_position"></has-error>
                                </div>
                            </div>


                            <div class="form row">
                                <div class="form-group col-md-6">
                                    <label>Leader</label>
                                    <select name="id_leader" required="" id="id_leader" v-model="form.id_leader" class="form-control" :class="{'is-invalid': form.errors.has('id_leader')}">
                                        <option value="">Pilih Leader</option>
                                        <option v-for="leader in leaders" :value="leader.id_leader" :key="leader.value">
                                            {{ leader.name }} || {{ leader.type }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="id_leader"></has-error>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>ID Canvasser</label>
                                    <select name="id_canvas" id="id_canvas" v-model="form.id_canvas" class="form-control" :class="{'is-invalid': form.errors.has('id_canvas')}">
                                        <option value="">Pilih ID Canvaser</option>
                                        <option v-for="canvaser in canvasers" :value="canvaser.id_canvas" :key="canvaser.value">
                                            {{ canvaser.id_canvasser }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="id_canvas"></has-error>
                                </div>
                            </div>

                            <div class="form row">
                                <div class="form-group col-md-6">
                                    <label>Jam Kerja</label>
                                    <select name="id_jamker" required="" id="id_jamker" v-model="form.id_jamker" class="form-control" :class="{'is-invalid': form.errors.has('id_jamker')}">
                                        <option value="">Pilih Jam Kerja</option>
                                        <option v-for="jamker in jamkers" :value="jamker.id_jamker" :key="jamker.value">
                                            {{ jamker.start }} - {{ jamker.end }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="id_jamker"></has-error>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select name="tipe" id="tipe" v-model="form.tipe" class="form-control" :class="{'is-invalid': form.errors.has('tipe')}">
                                        <option value="">Status</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Nonaktif</option>
                                        <option value="resign">Resign</option>
                                    </select>
                                    <has-error :form="form" field="tipe"></has-error>
                                </div>
                            </div>

                            <div class="form row">
                                <div class="form-group col-md-6">
                                    <label>Mulai Bekerja</label>
                                    <input v-model="form.created_at" required="" type="text" name="created_at" class="form-control" :class="{ 'is-invalid': form.errors.has('created_at') }">
                                    <has-error :form="form" field="created_at"></has-error>
                                </div>

                                <div class="form-group col-md-6" v-if="form.tipe === 'resign'">
                                    <label>Tanggal Resign</label>
                                    <input v-model="form.resign_at" required="" type="text" name="resign_at" class="form-control" :class="{ 'is-invalid': form.errors.has('resign_at') }">
                                    <has-error :form="form" field="resign_at"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update </button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal -->



        <!-- hapus Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to delete?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('admin/hapususer/' . $n['id']); ?>">Delete</a>
                    </div>
                </div>
            </div>
        </div>