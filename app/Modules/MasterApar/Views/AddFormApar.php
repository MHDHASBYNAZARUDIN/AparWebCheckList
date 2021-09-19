<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<section>
<div class="container">
    <div class="row">
        <div class="col-3">&nbsp;</div>
        <div class="col-6">
            <h1 class="text-center">TAMBAH APAR</h1>
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
                    <label for="lokasi">NO. PERIKSA :</label>
                    <input type="text" class="form-control" id="noperiksa" name="noperiksa" placeholder="No. Periksa" value="<?=isset($rec['noperiksa'])?$rec['noperiksa']:''; ?>">
            <!-- ******************************************************************************** -->
                    <label for="lokasi">LOKASI :</label>
                    <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-location-arrow"></i>
                        </span>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="lokasi" value="<?=isset($rec['lokasi'])?$rec['lokasi']:''; ?>">
                    </div>
                <div class="form-group">
                                <label for="jenis">JENIS APAR :</label>
                            <div class="input-group w-100">
                                <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-fire-extinguisher"></i>
                                </span>
                                <select class="form-control" id="jenis" name="jenis">
                                    <option value="0">Jenis</option>
                                    <?php 
                                        $options = ''; 
                                        foreach($selec as $k => $v){
                                           $selected = isset($rec['jenis'])?($rec['jenis'] ==$v->id_jenis?'selected':''):''; 
                                           $options .= '<option value="'.$v->id_jenis.'" '.$selected.'>'.$v->jenis.'</option>';
                                        }
                                        echo $options;
                                    ?>
                                </select>
                            </div>
                </div>
                            
                <div class="form-row">
                <div class="col">
                    <label for="masa_berlaku_awal">MASA BERLAKU AWAL :</label>
                    <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                    <input type="text" class="form-control" id="masa_berlaku_awal" name="masa_berlaku_awal" placeholder="Tahun/Bulan/Tanggal" value="<?=isset($rec['masa_berlaku_awal'])?$rec['masa_berlaku_awal']:''; ?>">
                    </div>
                </div>
                <div class="col">
                    <label for="masa_berlaku_akhir">MASA BERLAKU AKHIR :</label>
                    <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                    <input type="text" class="form-control" id="masa_berlaku_akhir" name="masa_berlaku_akhir" placeholder="Tahun/Bulan/Tanggal" value="<?=isset($rec['masa_berlaku_akhir'])?$rec['masa_berlaku_akhir']:''; ?>">
           <!-- ******************************************************************************** --> 
                    </div>
                </div>
                </div>
                        <label for="photo">FOTO :</label>
                    <div class="custom-file">
                        <input name="foto" id="foto" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
            <!-- ***************************************************************************************** -->             
                    <label for="Deskripsi">DESKRIPSI :</label>
                    <textarea class="form-control" id="Deskripsi" name="Deskripsi" rows="3"><?=isset($rec['Deskripsi'])?$rec['Deskripsi']:''; ?></textarea>
                </div>
                <input type="hidden" name="id_apar" id="id_apar" value="<?=isset($rec['id_apar'])?$rec['id_apar']:''; ?>">
                <button type="submit" class="btn btn-info mb-2"><i class="fas fa-save"></i> SAVE</button>
                <button type="reset" class="btn btn-danger mb-2">Reset</button>
            </form>
            
        </div>
        
        <div class="col-3">&nbsp;</div>
    </div>
</div>
</section>
<?= $this->endSection() ?>