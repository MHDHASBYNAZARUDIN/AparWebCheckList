<?php 
namespace TransaksiApar\Libraries;
use TransaksiApar\Models\TransaksiAparModel;

class TransaksiAparLib {

    public function __construct() {
        $config = config(App::class);
        $this->response = new Response($config);
    }

}