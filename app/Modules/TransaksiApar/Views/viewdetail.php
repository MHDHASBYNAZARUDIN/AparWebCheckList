<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">DETAIL TRANSAKSI</h1>
        </div>
        </div>
    <div class="row">
        <div class="col-12">
            <!--form navigasi-->    
            <form method="post" action="">
                <div class="form-row align-items-center float-sm-right">
                    <a href="<?=base_url().'/masterapar';?>" class="btn btn-warning b-align-link">Reset</a>&nbsp;
                    <a href="<?=base_url().'/masterapar/add';?>" class="btn btn-danger b-align-link"><i class="fas fa-plus-circle"></i></a>
                    
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Lokasi</label>
                        <input type="text" class="form-control mb-2" id="lokasi" name="lokasi" placeholder="Lokasi">
                    </div>
                    <button type="submit" class="btn btn-info mb-2"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!--end of form navigation-->
        <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">NO. PERIKSA</th>
                    <th scope="col">KONDISI FISIK</th>
                    <th scope="col">KONDISI PIN</th>
                    <th scope="col">KONDISI NOZZLE</th>
                    <th scope="col">KONDISI TEKANAN</th>
                    <th scope="col">KONDISI SELANG</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $rows = '';
                        $b = 1;
                        foreach($reco as $k => $v){
                            $rows .='<tr>';
                            $rows .= '<th>'.$b++.'</th>';
                            $rows .= '<td>'.date('d M Y',strtotime($v['created_at'])).'</td>';
                            $rows .= '<td>'.$v['id_apar'].'</td>';
                            $rows .= '<td>'.$v['kondisifisik'].'</td>';
                            $rows .= '<td>'.$v['kondisipin'].'</td>';
                            $rows .= '<td>'.$v['kondisinozzle'].'</td>';
                            $rows .= '<td>'.$v['kondisitekanan'].'</td>';
                            $rows .= '<td>'.$v['kondisiselang'].'</td>';
                            $rows .= '<td>';
                            $rows .= '<div class="btn-group" role="group" aria-label="User Action">';
                            #$rows .= '<a href="'.base_url().'/transaksiapar/add'.'" class="btn btn-warning"><i class="fas fa-tasks"></i></a>';
                            #$rows .= '<a href="'.base_url().'/masterapar/edit/'.$v['id_apar'].'" class="btn btn-success"><i class="fas fa-edit"></i></a>';
                            #$rows .= '<a href="'.base_url().'/masterapar/printl/'.$v['id_apar'].'" class="btn btn-primary"><i class="fas fa-print"></i></a>';
                            $rows .= '</div>';
                            $rows .= '</td>';
                            $rows .='</tr>';
                        }
                        echo $rows;
                    ?> 
                </tbody>
            </table>
            <nav aria-label="breadcrumb">
			
		</nav>
            </div>
        </div>

</section>
<?= $this->endSection() ?>