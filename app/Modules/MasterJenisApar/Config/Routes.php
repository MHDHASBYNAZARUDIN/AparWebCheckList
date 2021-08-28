<?php
if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}
$routes->add('masterjenisapar', 'MasterJenisApar\Controllers\MasterJenisApar::index');

