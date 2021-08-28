<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <?= session()->get('firstname');?>
            <?= session()->get('lastname');?>
            
    </div>
</div> 
<?= $this->endSection() ?>

