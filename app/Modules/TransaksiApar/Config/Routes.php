<?php
if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}
$routes->add('transaksiapar', 'TransaksiApar\Controllers\TransaksiApar::index');
$routes->add('transaksiapar/add', 'TransaksiApar\Controllers\TransaksiApar::add');

