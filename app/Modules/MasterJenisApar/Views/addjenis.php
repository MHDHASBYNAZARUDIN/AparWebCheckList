<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<section>
<div class="container">
    <div class="row">
        <div class="col-3">&nbsp;</div>
        <div class="col-6">
            <h1 class="text-center">TAMBAH JENIS APAR</h1>
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="shadow p-3 mb-5 bg-light rounded">
                        <label for="lokasi" row="3">JENIS APAR :</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Apar" value="<?=isset($rec['jenis'])?$rec['jenis']:''; ?>">
            <!-- ******************************************************************************** -->
                        <input type="hidden" name="id_jenis" id="id_jenis" value="<?=isset($rec['id_jenis'])?$rec['id_jenis']:''; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-info mb-2"><i class="fas fa-save"></i> SAVE</button>
                <button type="reset" class="btn btn-danger mb-2">Reset</button>
            </form>
            
        </div>
        
        <div class="col-3">&nbsp;</div>
    </div>
</div>
</section>
<?= $this->endSection() ?>