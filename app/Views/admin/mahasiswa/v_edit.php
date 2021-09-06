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
                echo form_open_multipart('mahasiswa/update/' . $mhs['id_mhs']);
                ?>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIM</label>
                        <input name="nim" class="form-control" value="<?= $mhs['nim'] ?>" placeholder="NIM" readonly>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input name="nama_mhs" class="form-control" value="<?= $mhs['nama_mhs'] ?>" placeholder="Nama Mahasiswa">
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" value="<?= $mhs['password'] ?>" placeholder="Password">
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <select name="id_prodi" class="form-control">
                        <option value="<?= $mhs['id_prodi'] ?>"><?= $mhs['jenjang'] ?>-<?= $mhs['prodi'] ?></option>
                        <?php foreach ($prodi as $key => $value) { ?>
                            <option value="<?= $value->id_prodi ?>"><?= $value->jenjang ?>-<?= $value->prodi ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto_mhs" id="preview_gambar" class="form-control">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('fotomhs/' . $mhs['foto_mhs']) ?>" id="gambar_load" width="150px">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger pull-left" data-dismiss="modal">Back</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <? echo form_close() ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>