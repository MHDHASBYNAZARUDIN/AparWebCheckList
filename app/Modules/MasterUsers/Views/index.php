<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<section>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">DAFTAR USER</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <form method="post" action="">
                <div class="form-row align-items-center float-sm-right">
                    <a href="<?=base_url().'/masterusers';?>" class="btn btn-warning b-align-link">Reset</a>&nbsp;
                    <a href="<?=base_url().'/masterusers/add';?>" class="btn btn-danger b-align-link"><i class="fas fa-plus-circle"></i></a>
                    
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Users</label>
                        <input type="text" class="form-control mb-2" id="users" name="firstname" placeholder="firstname">
                    </div>
                    <button type="submit" class="btn btn-info mb-2"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">FIRST NAME</th>
                    <th scope="col">LAST NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">CREATED</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $rows = '';
                        $A = '1';
                        foreach($rec as $k => $v){
                        /*echo '<pre>';
                        echo '<br>';
                        print_r($v);
                        echo '</pre>';
                        die();*/
                            $rows .='<tr>';
                            $rows .= '<th>'.$A++.'</th>';
                            $rows .= '<td>'.$v['firstname'].'</td>';
                            $rows .= '<td>'.$v['lastname'].'</td>';
                            $rows .= '<td>'.$v['email'].'</td>';
                            $rows .= '<td>'.$v['role'].'</td>';
                            $rows .= '<td>';
                            $rows .= '<div class="btn-group" role="group" aria-label="User Action">';
                            $caption = ($v['status'] >= 1)?'deactive':'activate';
                            $captionclass = ($v['status'] >= 1)?'btn-danger':'btn-warning';
                            $rows .= '<a href="'.base_url().'/masterusers/activation/'.$v['id'].'/'.$v['status'].'" class="btn '.$captionclass.'">'.$caption.'</a>';
                            $rows .= '</div>';
                            $rows .= '</td>';
                            $rows .= '<td>'.date('d M Y',strtotime($v['created_at'])).'</td>';
                            $rows .= '<td>';
                            $rows .= '<div class="btn-group" role="group" aria-label="User Action">';
                            $rows .= '<a href="'.base_url().'/masterusers/edit/'.$v['id'].'" class="btn btn-success"><i class="fas fa-edit"></i></a>';
                            $rows .= '</div>';
                            $rows .= '</td>';
                            $rows .='</tr>';
                        }
                        echo $rows;
                    ?> 
                </tbody>
            </table>
            </div>


</div>
</section>
<?= $this->endSection() ?>