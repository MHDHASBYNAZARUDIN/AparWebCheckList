<?php
if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}
$routes->add('masterjenisapar', 'MasterJenisApar\Controllers\MasterJenisApar::index');
$routes->add('masterjenisapar', 'MasterJenisApar\Controllers\MasterJenisApar::select');
$routes->add('masterjenisapar/add', 'MasterJenisApar\Controllers\MasterJenisApar::add');
$routes->add('masterjenisapar/delete/(:num)', 'MasterJenisApar\Controllers\MasterJenisApar::delete/$1');
$routes->add('masterjenisapar/edit/(:num)', 'MasterJenisApar\Controllers\MasterJenisApar::edit/$1');
$routes->add('masterjenisapar/printl/(:num)', 'MasterjenisApar\Controllers\MasterJenisApar::printl/$1');