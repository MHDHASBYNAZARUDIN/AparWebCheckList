<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>

<style>

  .jumbotron-fluid{
    background-image: url("images/aparwall.jpg");
    min-height : 720px;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    margin: 0;
 }
</style>

<div class="jumbotron jumbotron-fluid">
<div class="container gambar full-width-image">
<div class="row mt-5">
    <div class="col-md-6">
      <div class="py-5">
        <!-- menu + copy writing -->
        <strong><h1 class="text-primary font-weight-bolder display-4">Selamat Datang di <br> Web Aplikasi APAR</h1></strong>
        <div class="mt-3 text-white">
        Aplikasi berbasis Web ini bertujuan <br> untuk mempermudan petugas dalam pengecekan <br> alat pemadam kebakaran secara berkala.
        </div>  <br>
      
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-search"></i></a> <br>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><i class="fas fa-database"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><i class="far fa-calendar-alt"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link"><i class="fas fa-tasks"></i></a>
  </li>
</ul>       

      </div>      
    </div>
   
  </div>
</div>
</div>



<?= $this->endSection() ?>