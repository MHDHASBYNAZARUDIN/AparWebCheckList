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
                    <a href="<?=base_url().'/masterapar/add';?>" class="btn btn-danger b-align-link">Add</a>
                    
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Lokasi</label>
                        <input type="text" class="form-control mb-2" id="lokasi" name="lokasi" placeholder="Lokasi">
                    </div>
                    <button type="submit" class="btn btn-info mb-2">Find</button>
                </div>
            </form>
            <!--end of form navigation-->
        <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">LOKASI</th>
                    <th scope="col">MASA BERLAKU AWAL</th>
                    <th scope="col">MASA BERLAKU AKHIR</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">CREATED</th>
                    <th scope="col">CREATED BY</th>
                    <th scope="col">UPDATED</th>
                    <th scope="col">UPDATED BY</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $rows = '';
                        foreach($records as $k => $v){
                            $rows .='<tr>';
                            $rows .= '<th>'.$v['id_apar'].'</th>';
                            $rows .= '<td>'.$v['lokasi'].'</td>';
                            $rows .= '<td>'.$v['masa_berlaku_awal'].'</td>';
                            $rows .= '<td>'.$v['masa_berlaku_akhir'].'</td>';
                            $rows .= '<td>'.$v['foto'].'</td>';
                            $rows .= '<td>'.$v['Deskripsi'].'</td>';
                            $rows .= '<td>'.date('d M Y',strtotime($v['created_at'])).'</td>';
                            $rows .= '<td>'.session()->get('firstname').'</td>';
                            $rows .= '<td>'.date('d M Y',strtotime($v['updated_at'])).'</td>';
                            $rows .= '<td>'.session()->get('firstname').'</td>';
                            $rows .= '<div class="btn-group" role="group" aria-label="User Action">';
                            $rows .= '<td><a href="'.base_url().'/masterapar/edit/'.$v['id_apar'].'" class="btn btn-success">EDIT</a>';
                            $rows .= '</div>';
                            $rows .= '</td>';
                            $rows .='</tr>';
                        }
                        echo $rows;
                    ?> 
                </tbody>
            </table>
            <nav aria-label="breadcrumb">
			<?php echo $pager->links('bootstrap', 'Pagination_boot') ?> 
		</nav>
            </div>
        </div>

</section>
<?= $this->endSection() ?>