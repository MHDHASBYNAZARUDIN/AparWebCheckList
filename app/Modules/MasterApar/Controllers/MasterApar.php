<?php 
namespace MasterApar\Controllers;
use CodeIgniter\Controller;
use \MasterApar\Models\MasterAparModel;
use \MasterApar\Libraries\MasterAparLib;


class MasterApar extends Controller
{
    /**
     * Constructor.
     *
     */
    public $MasterAparLib;

    public function __construct()
    {
        $this->cperpage = 10;
        $this->MasterAparLib = new MasterAparLib();
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
        $agent = new MasterAparModel(); 
        if ($this->request->getMethod() == 'post') {
            $lokasi       = $this->request->getVar('lokasi');
            #$records        = $agent->where('nama_biro LIKE \'%'.$nama_biro.'%\'')->findAll();
            $records        = $agent->where('lokasi LIKE \'%'.$lokasi.'%\'')->paginate($this->cperpage,'bootstrap');
            
        }else{
            #$records    = $agent->findAll();
            $records     = $agent->paginate($this->cperpage,'bootstrap');
        }   
         
        if(count($records) > 0){
            foreach($records as $k => $v){
                
                if(isset($v['created_at'])){
                    $path = ROOTPATH.'public/images/'.str_replace('-','/',substr($v['created_at'],0,10)).'/';
                    if(file_exists($path.$v['id_apar'].'.png')){
                        $photo = '/images/'.str_replace('-','/',substr($v['created_at'],0,10)).'/'.$v['id_apar'].'.png';
                    }elseif(file_exists($path.$v['id_apar'].'.jpg')){
                        $photo = '/images/'.str_replace('-','/',substr($v['created_at'],0,10)).'/'.$v['id_apar'].'.jpg';
                    }elseif(file_exists($path.$v['id_apar'].'.jpeg')){
                        $photo = '/images/'.str_replace('-','/',substr($v['created_at'],0,10)).'/'.$v['id_apar'].'.jpeg';
                    }else{
                        $photo = '/images/default.png'; 
                    }
                 }else{
                    $photo = '/images/default.png';
                 }

                $v['foto'] = $photo.'?'.date('YmdHis'); 
                $ret[] = $v; 
            //echo '<pre>';
            //echo '<br>';
            //print_r($ret);
            //echo '</pre>';
            //die();
            }
            
        }
        $jenis = $this->MasterAparLib->getjenisselect();
        $data['selec'] = $jenis; 
        $data               = [];
        $data['records']    = $ret; 
        //echo '<pre>';
        //echo '<br>';
        //print_r($jenis);
        //echo '</pre>';
        //die();
        $data['offset']     = $offset;
        $data['page']       = $page;
        $data['pager']      = $agent->pager;
                
        helper(['form']);
        
        
        return view('MasterApar\Views\index', $data);
        return view('MasterApar\Views\AddFormApar', $data);
    }

    public function add(){
        $data  = [];
        helper(['form']);
        $oroles = new MasterAparModel(); 
        //$Tjenis = new Tajenis;
        if ($this->request->getMethod() == 'post') {
            $response = $this->MasterAparLib->storedata();
            if ($response->status != \Utils\Libraries\UtilsResponseLib::$SUCCESS) {
                //failed requirement 
                $data = $response->error;
                $jenis = $this->MasterAparLib->getjenisselect();
                $data['selec'] = $jenis;    
                $data['mode']    = 'add';                
                return view('MasterApar\Views\AddFormApar', $data);
            } else {
                //on success 
                return redirect()->to(base_url() . '/masterapar');
            }
        }else{
            //load edit first time   
            $jenis = $this->MasterAparLib->getjenisselect();
            $data['selec'] = $jenis;    
            $data['mode']    = 'add';
            return view('MasterApar\Views\AddFormApar', $data);
        }
    }
    public function edit($id_apar=''){
        $data  = [];
        helper(['form']);
        $oroles = new MasterAparModel();
        //mendeteksi request 
        if ($this->request->getMethod() == 'post') {
            $response = $this->MasterAparLib->storedata();
            if ($response->status != \Utils\Libraries\UtilsResponseLib::$SUCCESS) {
                //failed requirement 
                $record = $oroles->find($id_apar);
                $data = $response->error;
                $jenis = $this->MasterAparLib->getjenisselect();
                $data['selec'] = $jenis;
                $data['mode']    = 'edit/'.$id_apar;
                $data['rec']     = $record;
                
                return view('MasterApar\Views\AddFormApar', $data);

            } else {
                //on success 
                return redirect()->to(base_url() . '/masterapar');
            }
        }else{
            //load edit first time 
            $record = $oroles->find($id_apar);
            $jenis = $this->MasterAparLib->getjenisselect();
            $data['selec'] = $jenis;
            $data['mode']   = 'edit/'.$id_apar;
            $data['rec']    = $record;

            return view('MasterApar\Views\AddFormApar', $data);
        }
        
    }

    public function printl($eid){
        $data  = [];
        helper(['form']);
        $oroles = new MasterAparModel();
        //mendeteksi request 
        $role = $this->MasterAparLib->genQrcode($eid);
                //failed requirement 
               $record = $oroles->find($eid);
               $data['rec'] = $record;
                //$data = $response->error;
              // $data['mode']    = 'printl/'.$eid;
                $data['qrcode']     = $role;
                
                
            return view('MasterApar\Views\print', $data);
        
    }
    
    
}