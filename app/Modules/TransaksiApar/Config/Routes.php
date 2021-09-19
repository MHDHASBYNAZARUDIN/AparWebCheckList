<?php
if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}
$routes->add('transaksiapar/(:num)', 'TransaksiApar\Controllers\TransaksiApar::index/$1');
$routes->add('transaksiapar/add/(:num)', 'TransaksiApar\Controllers\TransaksiApar::add/$1');

