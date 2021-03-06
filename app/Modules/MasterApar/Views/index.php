<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Daftar Apar</h1>
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
        <div class="table-responsive">
        <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NO. PERIKSA</th>
                    <th scope="col">LOKASI</th>
                    <th scope="col">JENIS</th>
                    <th scope="col">MASA BERLAKU AWAL</th>
                    <th scope="col">MASA BERLAKU AKHIR</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">CREATED</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $role = session()->get('role');
                        $rows = '';
                        foreach($records as $k => $v){
                            $rows .='<tr>';
                            $rows .= '<th>'.$v['id_apar'].'</th>';
                            $rows .= '<td>'.$v['noperiksa'].'</td>';
                            $rows .= '<td>'.$v['lokasi'].'</td>';
                            $rows .= '<td>'.$v['jenis'].'</td>';
                            $rows .= '<td>'.date('d M Y',strtotime($v['masa_berlaku_awal'])).'</td>';
                            $rows .= '<td>'.date('d M Y',strtotime($v['masa_berlaku_akhir'])).'</td>';
                            $rows .= '<td><img src="'.base_url().$v['foto'].'" width="50">';
                            $rows .= '</td>';
                            $rows .= '<td>'.$v['Deskripsi'].'</td>';
                            $rows .= '<td>'.date('d M Y',strtotime($v['created_at'])).'</td>';
                            $rows .= '<td>';
                            $rows .= '<div class="btn-group" role="group" aria-label="User Action">';
                            $rows .= '<a href="'.base_url().'/transaksiapar/add/'.$v['id_apar'].'" class="btn btn-warning"><i class="fas fa-tasks"></i></a>';
                            $rows .= '<a href="'.base_url().'/transaksiapar/'.$v['id_apar'].'" class="btn btn-dark"><i class="fas fa-info-circle"></i></a>';
                            if (session()->get('role')==2) :
                            $rows .= '<a href="'.base_url().'/masterapar/edit/'.$v['id_apar'].'" class="btn btn-success"><i class="fas fa-edit"></i></a>';
                            endif; 
                            $rows .= '<a href="'.base_url().'/masterapar/printl/'.$v['id_apar'].'" class="btn btn-primary"><i class="fas fa-print"></i></a>';
                            $rows .= '</div>';
                            $rows .= '</td>';
                            $rows .='</tr>';
                        }
                        echo $rows;
                    ?> 
                </tbody>
            </table>
            </div>
            <nav aria-label="breadcrumb">
			<?= ($pager->getPageCount() > 1)?$pager->links('bootstrap', 'Pagination_boot'):'' ?> 
		</nav>
            </div>
        </div>

</section>
<?= $this->endSection() ?>