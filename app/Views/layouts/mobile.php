<!--Blitar, 03/05/2020, Bismillahirrahmanirrahim..-->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>APAR WEB APPS</title>
        <link rel="stylesheet" href="<?=base_url()?>/assets/css/mobile.css">
        <script type="text/javascript" src="<?=base_url()?>/assets/js/jquery/jquery-3.5.1.js"></script>        
    </head>
    <body>
	
	<!--content utama echo disini rek-->
	
	<?= $this->renderSection('content') ?>
	
	<!--end of maint content-->
	<br>
    <button id="btnPrint" class="hidden-print">Print</button>
	<script type="text/javascript" src="<?=base_url()?>/assets/js/mobileprint.js"></script>
	</body>
</html>