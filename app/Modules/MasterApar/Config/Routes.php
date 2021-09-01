<?php
if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}
$routes->add('masterapar', 'MasterApar\Controllers\MasterApar::index');
$routes->add('masterapar', 'MasterApar\Controllers\MasterApar::select');
$routes->add('masterapar/add', 'MasterApar\Controllers\MasterApar::add');
$routes->add('masterapar/edit/(:num)', 'MasterApar\Controllers\MasterApar::edit/$1');


