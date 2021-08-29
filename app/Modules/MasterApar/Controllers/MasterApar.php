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
        $this->cperpage = 2;
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
        $data               = [];
        $data['records']    = $records; 
        $data['offset']     = $offset;
        $data['page']       = $page;
        $data['pager']      = $agent->pager;

        $data['data'] = $records;
                
        helper(['form']);
        
        
        return view('MasterApar\Views\index', $data);
    }
    public function add(){
        $data  = [];
        helper(['form']);
        $oroles = new MasterAparModel(); 
        if ($this->request->getMethod() == 'post') {
            $response = $this->MasterAparLib->storedata();
            if ($response->status != \Utils\Libraries\UtilsResponseLib::$SUCCESS) {
                //failed requirement 
                $data = $response->error;
                $data['mode']    = 'add';                
                return view('MasterApar\Views\AddFormApar', $data);
            } else {
                //on success 
                return redirect()->to(base_url() . '/masterapar');
            }
        }else{
            //load edit first time       
            $data['mode']    = 'add';           
            return view('MasterApar\Views\AddFormApar', $data);
        }
        /*$database = \Config\Database::connect();
        $db = $database->table('apar');
    
        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png]',
                'max_size[file,1024]',
            ]
        ]);
        $destination    = ROOTPATH.'public/images/';
    
        if (!$input) {
            print_r('Choose a valid file');
        } else {
            $img = $this->request->getFile('file');
            $img->move($destination . 'uploads');
    
            $data = [
               'lokasi' =>  $img->getName(),
               'foto'  => $img->getClientMimeType()
            ];
    
            $save = $db->insert($data);
            print_r('File has successfully uploaded');        
        }*/
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

            $data['mode']   = 'edit/'.$id_apar;
            $data['rec']    = $record;

            return view('MasterApar\Views\AddFormApar', $data);
        }
        
    }
    
    
}