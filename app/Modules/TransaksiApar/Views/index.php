<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<section>
<div class="container">
    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-8">
            <h1 class="text-center">KONDISI</h1>
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

                    <div class="form-group">
                                    <label for="noperiksaapar">NO. PERIKSA :</label>
                                    <select class="form-control" id="noperiksaapar" name="noperiksaapar">
                                    <option value="0"></option>
                                        <?php 
                                            $options = ''; 
                                            foreach($pilihapar as $k => $v){
                                            $selected = isset($rec['noperiksaapar'])?($rec['noperiksaapar'] == $v['id_apar']?'selected':''):''; 
                                            $options .= '<option value="'.$v['id_apar'].'" '.$selected.'>'.$v['noperiksa'].'</option>';
                                            }
                                            echo $options;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kondisifisik">KONDISI FISIK TABUNG:</label>
                                    <select class="form-control" id="kondisifisik" name="kondisifisik">
                                        <option value="0"></option>
                                        <?php 
                                            $options = ''; 
                                            foreach($pilih as $k => $v){
                                            $selected = isset($rec['kondisifisik'])?($rec['kondisifisik'] ==$v->id_kondisi?'selected':''):''; 
                                            $options .= '<option value="'.$v->id_kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                                            }
                                            echo $options;
                                        ?>
                                    </select>
                        <div class="form-group">
                                <label for="kondisipin">KONDISI PIN :</label>
                                <select class="form-control" id="kondisipin" name="kondisipin">
                                    <option value="0"></option>
                                    <?php 
                                        $options = ''; 
                                        foreach($pilih as $k => $v){
                                           $selected = isset($rec['kondisipin'])?($rec['kondisipin'] ==$v->id_kondisi?'selected':''):''; 
                                           $options .= '<option value="'.$v->id_kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                                        }
                                        echo $options;
                                    ?>
                                </select>
                        </div>
                </div>
                            <div class="form-group">
                                <label for="kondisitekanan">KONDISI TEKANAN :</label>
                                <select class="form-control" id="kondisitekanan" name="kondisitekanan">
                                    <option value="0"></option>
                                    <?php 
                                        $options = ''; 
                                        foreach($pilih as $k => $v){
                                           $selected = isset($rec['kondisitekanan'])?($rec['kondisitekanan'] ==$v->id_kondisi?'selected':''):''; 
                                           $options .= '<option value="'.$v->id_kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                                        }
                                        echo $options;
                                    ?>
                                </select>
                            </div>
                   
                        <div class="form-group">
                                <label for="kondisinozzle">KONDISI NOZZLE :</label>
                                <select class="form-control" id="kondisinozzle" name="kondisinozzle">
                                    <option value="0"></option>
                                    <?php 
                                        $options = ''; 
                                        foreach($pilih as $k => $v){
                                           $selected = isset($rec['kondisinozzle'])?($rec['kondisinozzle'] ==$v->id_kondisi?'selected':''):''; 
                                           $options .= '<option value="'.$v->id_kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                                        }
                                        echo $options;
                                    ?>
                                </select>
                        </div>
                    
                    
                   
                        <div class="form-group">
                                <label for="kondisiselang">KONDISI SELANG :</label>
                                <select class="form-control" id="kondisiselang" name="kondisiselang">
                                    <option value="0"></option>
                                    <?php 
                                        $options = ''; 
                                        foreach($pilih as $k => $v){
                                           $selected = isset($rec['kondisiselang'])?($rec['kondisiselang'] ==$v->id_kondisi?'selected':''):''; 
                                           $options .= '<option value="'.$v->id_kondisi.'" '.$selected.'>'.$v->kondisi.'</option>';
                                        }
                                        echo $options;
                                    ?>
                                </select>
                        </div>
                    <!--    -->
                      </div>
                
                <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?=isset($reco['id_transaksi'])?$reco['id_transaksi']:''; ?>">
                <button type="submit" class="btn btn-info mb-2">Save</button>
                <button type="reset" class="btn btn-danger mb-2">Reset</button>
            </form>
            
        </div>
        
        <div class="col-3">&nbsp;</div>
    </div>
</div>
</section>
<?= $this->endSection() ?>