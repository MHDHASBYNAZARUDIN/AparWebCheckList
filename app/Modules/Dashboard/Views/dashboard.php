<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
    <div class="col-9">
        <br>
    </div>        
        <div class="col-3">
            <br>
            <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= session()->get('firstname');?>
            <?= session()->get('lastname');?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

    </div>
</div> 
<?= $this->endSection() ?>

