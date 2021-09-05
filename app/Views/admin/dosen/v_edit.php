<sectio class="conten-header">
    <h1 class="text-center">
        <?= $title ?>
    </h1>
    <br>
</sectio>

<div class="row">
    <div class="col-lg-6" style="float:none;margin:auto;">
        <div class="box box-success box-solid">
            <div class="box-header with-border ">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <?php
                echo form_open_multipart('dosen/update/' . $dosen['id_dosen']);
                ?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kode Dosen</label>
                        <input name="kode_dosen" class="form-control" value="<?= $dosen['id_dosen'] ?>" placeholder="Kode Dosen">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIDN</label>
                        <input name="nidn" class="form-control" value="<?= $dosen['nidn'] ?>" placeholder="NIDN">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Dosen</label>
                    <input name="nama_dosen" class="form-control" value="<?= $dosen['nama_dosen'] ?>" placeholder="Nama Dosen">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" value="<?= $dosen['password'] ?>" placeholder="Password">
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto_dosen" id="preview_gambar" class="form-control">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('fotodosen/' . $dosen['foto_dosen']) ?>" id="gambar_load" width="150px">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="<?= base_url('dosen') ?>" class="btn btn-danger pull-left" data-dismiss="modal">Back</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <? echo form_close() ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>