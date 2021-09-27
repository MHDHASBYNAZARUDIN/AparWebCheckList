<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Tambah User</h3>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                            <label for="firstname">First Name</label>
                                <div class="input-group w-100">
                                    <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-address-card"></i>
                                    </span>
                                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?=isset($rec['firstname'])?$rec['firstname']:''; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <div class="input-group w-100">
                                        <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-address-card"></i>
                                        </span>
                                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?=isset($rec['lastname'])?$rec['lastname']:''; ?>">
                                </div>        
                            </div>
                        </div>

                    <div class="col-12">
                        <div class="form-group">
                                <label for="jenis">CATEGORY :</label>
                            <div class="input-group w-100">
                                <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-users-cog"></i>
                                </span>
                                <select class="form-control" id="role" name="role">
                                    <option > </option>
                                    <?php 
                                        $options = ''; 
                                        foreach($selec as $k => $v){
                                           $selected = isset($rec['role'])?($rec['role'] ==$v->id_role?'selected':''):''; 
                                           $options .= '<option value="'.$v->id_role.'" '.$selected.'>'.$v->role.'</option>';
                                        }
                                        echo $options;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                            <div class="input-group w-100">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-at"></i>
                                </span>
                                <input type="text" class="form-control" name="email" id="email" value="<?=isset($rec['email'])?$rec['email']:''; ?>">
                            </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                            <div class="input-group w-100">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input type="password" class="form-control" name="password" id="password" value="">
                            </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group w-100">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-key"></i>
                                    </span>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-sm-12 text-right">
                        <input type="hidden" name="id" id="id" value="<?=isset($rec['id'])?$rec['id']:''; ?>">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
                
            </div>
            
        </div>
        
    </div>
</div>
<?= $this->endSection() ?>