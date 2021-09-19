<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-6 offset-sm-2 col-md-5 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3><?=lang('Users.form.login_title')?></h3>
                <hr>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success');?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?=base_url()?>/login" method="post">
                        <label for="email"><?=lang('Users.form.email')?></label>
                    <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-user-circle"></i>
                        </span>
                        <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email')?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="password"><?=lang('Users.form.password')?></label>
                        <div class="input-group w-100">
                            <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-key"></i>
                            </span>
                        <input type="password" class="form-control" name="password" id="password" value="">
                        </div>
                    </div>
                    
                    <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-12 col-sm-8">
                            <a href="<?=base_url()?>/register"><?=lang('Users.form.new_user')?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="col-12 col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary"><?=lang('Users.form.button.login')?></button>
                        </div>
                    </div>
                        
                </form>
                
            </div>
            
        </div>
        
    </div>
</div>
<?= $this->endSection() ?>
