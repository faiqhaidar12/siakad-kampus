<sectio class="conten-header">
    <h1>
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
                echo form_open('ruangan/update/' . $ruangan['id_ruangan']);
                ?>
                <div class="form-group">
                    <label>Gedung</label>
                    <select name="id_gedung" class="form-control">
                        <option value="<?= $ruangan['id_gedung'] ?>"><?= $ruangan['gedung'] ?></option>
                        <?php foreach ($gedung as $key => $value) { ?>
                            <option value="<?= $value->id_gedung ?>"><?= $value->gedung ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Ruangan</label>
                    <input name="ruangan" value="<?= $ruangan['ruangan'] ?>" class="form-control" placeholder="Ruangan" required>
                </div>


            </div>
            <div class="modal-footer">
                <a href="<?= base_url('ruangan') ?>" class="btn btn-danger pull-left" data-dismiss="modal">Back</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <? echo form_close() ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>