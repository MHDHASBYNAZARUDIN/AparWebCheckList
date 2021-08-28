<?php 
namespace MasterJenisApar\Libraries;
use MasterJenisApar\Models\MasterJenisAparModel;

class MasterJenisAparLib {

    public function __construct() {
        $config = config(App::class);
        $this->response = new Response($config);
    }

}