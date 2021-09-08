<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<section>
<div class="container">
<div class="row">
    <div class="col-12">
    <h1></h1>
    <form method="post" action="">
                <div class="form-row align-items-center float-sm-left">
                    <a href="<?=base_url().'/transaksiapar';?>" class="btn btn-warning b-align-link">Reset</a>&nbsp;
                    <a href="<?=base_url().'/masterapar/add';?>" class="btn btn-danger b-align-link"><i class="fas fa-plus-circle"></i></a>
                    
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">No. Periksa</label>
                        <input type="text" class="form-control mb-2" id="lokasi" name="lokasi" placeholder="No. Periksa">
                    </div>
                    <button type="submit" class="btn btn-info mb-2"><i class="fas fa-search"></i></button>
                </div>
            </form>
    </div>

    <div class="col-5">
    <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="p-3 mb-2 bg-secondary text-white">
        <div class="form-row align-items-center float-sm-center">
            <img src="'.base_url().$v['foto'].'" width="50">
        </div>

                    <label for="lokasi">LOKASI :</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" 
                    value="<?=isset($rec['lokasi'])?$rec['lokasi']:''; ?>">

                    <label for="jenis">JENIS APAR :</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" 
                    value="<?=isset($rec['jenis'])?$rec['jenis']:''; ?>">

                    <div class="form-row">
                <div class="col">
                    <label for="masa_berlaku_awal">MASA BERLAKU AWAL :</label>
                    <input type="text" class="form-control" id="masa_berlaku_awal" name="masa_berlaku_awal" placeholder="Tahun/Bulan/Tanggal" value="<?=isset($rec['masa_berlaku_awal'])?$rec['masa_berlaku_awal']:''; ?>">
                </div>
                <div class="col">
                    <label for="masa_berlaku_akhir">MASA BERLAKU AKHIR :</label>
                    <input type="text" class="form-control" id="masa_berlaku_akhir" name="masa_berlaku_akhir" placeholder="Tahun/Bulan/Tanggal" value="<?=isset($rec['masa_berlaku_akhir'])?$rec['masa_berlaku_akhir']:''; ?>">
                </div>
                </div>

                <label for="Deskripsi">DESKRIPSI :</label>
                    <textarea class="form-control" id="Deskripsi" name="Deskripsi" rows="3"><?=isset($rec['Deskripsi'])?$rec['Deskripsi']:''; ?></textarea>

        </div>
        </div>
        </div>
    <div class="col-7">
    <div class="shadow p-3 mb-5 bg-body rounded">
        <div class="p-3 mb-2 bg-light bg-gradient text-dark">
            <h3 class="text-center">Kondisi</h3>
            <div class="form-group">
                <label for="kondisifisik">Fisik Tabung :</label>
                    <select class="form-control" id="kondisifisik" name="kondisifisik">
                    <option value="0"></option>
                        <?php 
                            $options = ''; 
                            foreach($pilih as $k => $v){
                               $selected = isset($reco['kondisifisik'])?($reco['kondisifisik']==$v['id_kondisi']?'selected':''):''; 
                               $options .= '<option value="'.$v->kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                            }
                            echo $options;
                        ?>
                        </select>
            </div>

            <div class="form-group">
                <label for="kondisipin">PIN :</label>
                    <select class="form-control" id="kondisipin" name="kondisipin">
                    <option value="0"></option>
                        <?php 
                        $options = ''; 
                        foreach($pilih as $k => $v){
                           $selected = isset($rec['kondisipin'])?($rec['kondisipin']==$v['id_kondisi']?'selected':''):''; 
                           $options .= '<option value="'.$v->kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                        }
                        echo $options;
                        ?>
                        </select>
            </div>

            <div class="form-group">
                <label for="kondisitekanan">Tekanan :</label>
                    <select class="form-control" id="kondisitekanan" name="kondisitekanan">
                    <option value="0"></option>
                        <?php 
                        $options = ''; 
                        foreach($pilih as $k => $v){
                           $selected = isset($rec['kondisifisik'])?($rec['kondisifisik']==$v['id_kondisi']?'selected':''):''; 
                           $options .= '<option value="'.$v->kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                        }
                        echo $options;  
                        ?>
                        </select>
            </div>

            <div class="form-group">
                <label for="kondisinozzle">Nozzle :</label>
                    <select class="form-control" id="kondisinozzle" name="kondisinozzle">
                    <option value="0"></option>
                        <?php 
                        $options = ''; 
                        foreach($pilih as $k => $v){
                           $selected = isset($rec['kondisinozzle'])?($rec['kondisinozzle']==$v['id_kondisi']?'selected':''):''; 
                           $options .= '<option value="'.$v->kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                        }
                        echo $options;  
                        ?>
                        </select>
            </div>

            <div class="form-group">
                <label for="kondisiselang">Selang :</label>
                    <select class="form-control" id="kondisiselang" name="kondisiselang">
                    <option value="0"></option>
                        <?php 
                        $options = ''; 
                        foreach($pilih as $k => $v){
                           $selected = isset($rec['kondisiselang'])?($rec['kondisiselang']==$v['id_kondisi']?'selected':''):''; 
                           $options .= '<option value="'.$v->kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                        }
                        echo $options;  
                        ?>
                        </select>
            </div>
        </div>
        </div>
                <button type="submit" class="btn btn-info mb-2">Save</button>
                <button type="reset" class="btn btn-danger mb-2">Reset</button>
    </div>
</div>
</section>
<?= $this->endSection() ?>