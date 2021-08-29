<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>APAR WEB APPS</title>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script type="text/javascript" src="/assets/js/jquery/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="/assets/js/jquery/datepicker.js"></script>
    </head>
    <body>
        <?php 
            $uri = service('uri');
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="<?=base_url()?>/dashboard">APAR WEB APPS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if (session()->get('isLoggedIn')) : ?>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?=base_url()?>/masterapar">Apar</a>
                        <a class="dropdown-item" href="<?=base_url()?>/masterjenisapar">Jenis Apar</a>
                        <a class="dropdown-item" href="<?=base_url()?>/transaksiapar">Transaksi Apar</a>
                </div>
                    </li>
                </ul>
    
                <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item <?= ($uri->getSegment(1) == 'profile')? 'active' : null?>">
                        <a class="nav-link" href="<?=base_url()?>/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>/logout">Logout</a>
                    </li>

                </ul>
                <?php else: ?>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item <?= ($uri->getSegment(1) == 'login')? 'active' : null?>">
                        <a class="nav-link" href="<?=base_url()?>/login">Login</a>
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(1) == 'register')? 'active' : null?>">
                        <a class="nav-link" href="<?=base_url()?>/register">Register</a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
                </a>
        </nav>
        <?= $this->renderSection('content') ?>
   </body>
</html>        