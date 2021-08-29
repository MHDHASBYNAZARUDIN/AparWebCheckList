<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<section>
<div class="container">
    <div class="row">
        <div class="col-3">&nbsp;</div>
        <div class="col-6">
            <h1 class="text-center">Tambah Apar</h1>
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="lokasi" value="<?=isset($rec['lokasi'])?$rec['lokasi']:''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="lokasi">Jenis Apar</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" placeholder="jenis apar" value="<?=isset($rec['jenis'])?$rec['jenis']:''; ?>">
                </div>

                <div class="form-group">
                    <label for="masa_berlaku_awal">Masa Berlaku Awal</label>
                    <input type="text" class="form-control" id="masa_berlaku_awal" name="masa_berlaku_awal" placeholder="Masa Berlaku Awal" value="<?=isset($rec['masa_berlaku_awal'])?$rec['masa_berlaku_awal']:''; ?>">
                </div>

                <div class="form-group">
                    <label for="masa_berlaku_akhir">Masa Berlaku Akhir</label>
                    <input type="text" class="form-control" id="masa_berlaku_akhir" name="masa_berlaku_akhir" placeholder="Masa Berlaku Akhir" value="<?=isset($rec['masa_berlaku_akhir'])?$rec['masa_berlaku_akhir']:''; ?>">
                </div>

                <div class="form-group">
                        <label for="photo">Foto</label>
                    <div class="custom-file">
                        <input name="foto" id="foto" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="Deskripsi" name="Deskripsi" rows="3"><?=isset($rec['Deskripsi'])?$rec['Deskripsi']:''; ?></textarea>
                </div>
                <input type="hidden" name="id_apar" id="id_apar" value="<?=isset($rec['id_apar'])?$rec['id_apar']:''; ?>">
                <button type="submit" class="btn btn-info mb-2">Save</button>
                <button type="reset" class="btn btn-danger mb-2">Reset</button>
            </form>
            
        </div>
        
        <div class="col-3">&nbsp;</div>
    </div>
</div>
</section>
<?= $this->endSection() ?>