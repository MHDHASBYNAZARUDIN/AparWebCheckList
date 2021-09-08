<?php 
namespace TransaksiApar\Controllers;
use CodeIgniter\Controller;
use \TransaksiApar\Libraries\TransaksiAparLib;
use \MasterApar\Libraries\MasterAparLib;
use \MasterApar\Models\MasterAparModel;

class TransaksiApar extends Controller
{
    /**
     * Constructor.
     *
     */
    public $TransaksiAparLib;

    public function __construct()
    {
        $this->TransaksiAparLib = new TransaksiAparLib();
        
    }
    
    /**
     * Index
     *
     * @return View
     */
    public function index()
    {   
        $data  = [];
        helper(['form']);
        $agent = new MasterAparModel(); 
        if ($this->request->getMethod() == 'post') {
            $lokasi       = $this->request->getVar('lokasi');
            #$records        = $agent->where('nama_biro LIKE \'%'.$nama_biro.'%\'')->findAll();
            $records        = $agent->where('lokasi LIKE \'%'.$lokasi.'%\'')->findAll();
            
        }else{
            $records    = $agent->findAll();
            #$records     = $agent;
        }

        $kondisi = $this->TransaksiAparLib->getkondisiselect();
        
        $data['pilih']  = $kondisi;
        $data['reco']    = $records;
        //echo '<pre>';
        //echo '<br>';
        //print_r($kondisi);
        //echo '</pre>';
        //die();
        //$data           = [];
    
        
        return view('TransaksiApar\Views\index', $data);
    }
}