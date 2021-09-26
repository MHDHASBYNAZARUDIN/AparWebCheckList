<?php
if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}
$routes->add('masterusers', 'MasterUsers\Controllers\MasterUsers::index');
$routes->add('masterusers/add', 'MasterUsers\Controllers\MasterUsers::add');
$routes->add('masterusers/edit/(:num)', 'MasterUsers\Controllers\MasterUsers::edit/$1');
$routes->add('masterusers/activation/(:num)/(:num)', 'MasterUsers\Controllers\MasterUsers::activation/$1/$2');