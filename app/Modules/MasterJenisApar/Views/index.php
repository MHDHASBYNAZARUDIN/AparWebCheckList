<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<section>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Daftar Jenis Apar</h1>
        </div>
        </div>
    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-8">
            <!--form navigasi-->    
            <form method="post" action="">
                <div class="form-row align-items-center float-sm-right">
                    <a href="<?=base_url().'/masterjenisapar';?>" class="btn btn-warning b-align-link">Reset</a>&nbsp;
                    <a href="<?=base_url().'/masterjenisapar/add';?>" class="btn btn-danger b-align-link"><i class="fas fa-plus-circle"></i></a>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">JENIS APAR</label>
                        <input type="text" class="form-control mb-2" id="Tjenis" name="jenis" placeholder="jenis">
                    </div>
                    <button type="submit" class="btn btn-info mb-2"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!--end of form navigation-->
        <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">JENIS APAR</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $rows = '';
                        foreach($records as $k => $v){
                            $rows .='<tr>';
                            $rows .= '<th>'.$v['id_jenis'].'</th>';
                            $rows .= '<td>'.$v['jenis'].'</td>';
                            $rows .= '<td>';
                            $caption = ($v['status'] >= 1)?'deactive':'activate';
                            $captionclass = ($v['status'] >= 1)?'btn-danger':'btn-warning';
                            $rows .= '<a href="'.base_url().'/masterjenisapar/activation/'.$v['id_jenis'].'/'.$v['status'].'" class="btn '.$captionclass.'">'.$caption.'</a>';
                            $rows .= '</td>';
                            $rows .= '<td>';
                            $rows .= '<div class="btn-group" role="group" aria-label="User Action">';
                            $rows .= '<a href="'.base_url().'/masterjenisapar/edit/'.$v['id_jenis'].'" class="btn btn-success"><i class="fas fa-edit"></i></a>';
                            $rows .= '</div>';
                            $rows .= '</td>';
                            $rows .='</tr>';
                        }
                        echo $rows;
                    ?> 
                </tbody>
            </table>
            <nav aria-label="breadcrumb"> 
            <?= ($pager->getPageCount() > 1)?$pager->links('bootstrap', 'Pagination_boot'):'' ?> 
		</nav>
            </div>
            <div class="col-2">&nbsp;</div>
        </div>

</section>
<?= $this->endSection() ?>