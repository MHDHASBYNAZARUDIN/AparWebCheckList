<?php 
namespace MasterJenisApar\Controllers;
use CodeIgniter\Controller;
use \MasterJenisApar\Models\MasterJenisAparModel;
use \MasterApar\Models\TaJenis;
use \MasterJenisApar\Libraries\MasterJenisAparLib;


class MasterJenisApar extends Controller
{
    /**
     * Constructor.
     *
     */
    public $MasterJenisAparLib;

    public function __construct()
    {
        $this->cperpage = 10;
        $this->MasterJenisAparLib = new MasterJenisAparLib();
    }
    
    /**
     * Index
     *
     * @return View
     */
    public function index()   {
        $page = $this->request->getVar('page');
        if($page){
            $offset = ($page-1)*$this->cperpage;
        }else{
            $offset = 1;
        }
        $agent = new TaJenis();
        if ($this->request->getMethod() == 'post') {
            $lokasi       = $this->request->getVar('jenis');
            #$records        = $agent->where('nama_biro LIKE \'%'.$nama_biro.'%\'')->findAll();
            $records        = $agent->where('jenis LIKE \'%'.$lokasi.'%\'')->paginate($this->cperpage,'bootstrap');
         /*   $records     = $agent->select('apar.id_apar,apar.masa_berlaku_awal,apar.masa_berlaku_akhir,
            apar.foto,apar.Deskripsi,apar.noperiksa,apar.lokasi,apar.jenis
            ,apar.created_at,apar.updated_at,Tjenis.jenis')
                            ->where('lokasi LIKE \'%'.$lokasi.'%\'')
                            ->join('Tjenis','Tjenis.id_jenis=apar.jenis','left') 
                            ->paginate($this->cperpage,'bootstrap');*/
        }else{
            #$records    = $agent->findAll();
            $records     = $agent->paginate($this->cperpage,'bootstrap');
            $lokasi       = $this->request->getVar('jenis');

           /* $records     = $agent->select('apar.id_apar,apar.masa_berlaku_awal,apar.masa_berlaku_akhir,
                            apar.foto,apar.Deskripsi,apar.noperiksa,apar.lokasi,apar.jenis
                            ,apar.created_at,apar.updated_at,Tjenis.jenis')
                            ->where('lokasi LIKE \'%'.$lokasi.'%\'')
                            ->join('Tjenis','Tjenis.id_jenis=apar.jenis','left') 
                            ->paginate($this->cperpage,'bootstrap');*/
            
        }
       //$records = $model;
        $data['records'] = $records;
        helper(['form']);        
        return view('MasterJenisApar\Views\index', $data);
    }

}
    
    
    
