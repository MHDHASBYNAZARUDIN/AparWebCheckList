<?php 
namespace MasterUsers\Controllers;
use CodeIgniter\Controller;
use \Users\Models\UsersModel;
use \MasterUsers\Libraries\MasterUsersLib;


class MasterUsers extends Controller
{
    /**
     * Constructor.
     *
     */

    public $MasterUSersLib;
    public function __construct()
    {
        $this->MasterUsersLib = new MasterUsersLib();
        
    }
    
    /**
     * Index
     *
     * @return View
     */
    public function index()
    {
        //$data = [];
        $users = new UsersModel();
        if ($this->request->getMethod() == 'post') {
            $firstname       = $this->request->getVar('firstname');
            //$records        = $users->where('firstname LIKE \'%'.$firstname.'%\'')->asArray()->findAll();
            $records        = $users->select('users.id,users.firstname,users.lastname,
            users.email,users.password,users.created_at,users.updated_at,users.role,users.status
            ,Role.role')
                            ->where('firstname LIKE \'%'.$firstname.'%\'')
                            ->join('Role','Role.id_role=users.role','left') 
                            ->asArray()->findAll();


        }else{
            $firstname       = $this->request->getVar('firstname');
            #$records        = $users->where('firstname LIKE \'%'.$firstname.'%\'')->asArray()->findAll();
            $records        = $users->select('users.id,users.firstname,users.lastname,
            users.email,users.password,users.created_at,users.updated_at,users.role,Role.role')
                            ->where('firstname LIKE \'%'.$firstname.'%\'')
                            ->join('Role','Role.id_role=users.role','left') 
                            ->asArray()->findAll();
        
        }
        
        $data['rec'] = $records;
            echo '<pre>';
            echo '<br>';
            print_r($records);
            echo '</pre>';
            die();

        helper(['form']);
        
        return view('MasterUsers\Views\index', $data);
    }
    public function add(){
        $data  = [];
        helper(['form']);
        $oroles = new UsersModel(); 
        //$Tjenis = new Tajenis;
        if ($this->request->getMethod() == 'post') {
            $response = $this->MasterUsersLib->storedata();
            if ($response->status != \Utils\Libraries\UtilsResponseLib::$SUCCESS) {
                //failed requirement 
                $data = $response->error;
                $role = $this->MasterUsersLib->getroleselect();
                $data['selec'] = $role;    
                $data['mode']    = 'add';                
                return view('MasterUsersr\Views\AddFormUsers', $data);
            } else {
                //on success 
                return redirect()->to(base_url() . '/masterusers');
            }
        }else{
            //load edit first time   
            $role = $this->MasterUsersLib->getroleselect();
            $data['selec'] = $role;    
            $data['mode']    = 'add';
            return view('MasterUsers\Views\AddFormUsers', $data);
        }
    }

    public function edit($id=''){
        $data  = [];
        helper(['form']);
        $oroles = new UsersModel();
        //mendeteksi request 
        if ($this->request->getMethod() == 'post') {
            $response = $this->MasterUsersLib->storedata();
            if ($response->status != \Utils\Libraries\UtilsResponseLib::$SUCCESS) {
                //failed requirement 
                $record = $oroles ->asArray()->find($id);
                $data = $response->error;
                $role = $this->MasterUsersLib->getroleselect();
                $data['selec'] = $role; 
                $data['mode']    = 'edit/'.$id;
                $data['rec']     = $record;
                
                
                return view('MasterUsers\Views\AddFormUsers', $data);

            } else {
                //on success 
                return redirect()->to(base_url() . '/masterusers');
            }
        }else{
            //load edit first time 
            $record = $oroles->asArray()->find($id);
            $role = $this->MasterUsersLib->getroleselect();
            $data['selec'] = $role; 
            $data['mode']   = 'edit/'.$id;
            $data['rec']    = $record;

            /*echo '<pre>';
            echo '<br>';
            print_r($record);
            echo '</pre>';
            die();*/

            return view('MasterUsers\Views\AddFormUsers', $data);
        }
    }

    public function activation($id,$sts){
        // die($id.'---'.$sts);
         if($id){
             if($sts==1){
                 $msts = 0;  
             }else{
                 $msts = 1;
             }
             $data = ['status' => $msts];    
             /*echo '<pre>';
             print_r($data);
             echo '</pre>';
             die('SKIP');*/
             $Usersmodel     = new UsersModel();
             $Usersmodel->update($id,$data);
         }
         return redirect()->to(base_url() . '/masterusers');
     }

}
