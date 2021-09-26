<?php 
namespace MasterUsers\Libraries;
use MasterUsers\Models\MasterUsersModel;
use Users\Models\UsersModel;
//use MasterApar\Models\TaJenis;
use Utils\Libraries\UtilsResponseLib;
use CodeIgniter\HTTP\Response;
use app\Libraries\Ciqrcode;
use stdClass;

class MasterUsersLib {
    use UtilsResponseLib;
    public function __construct() {
        $config = config(App::class);
        $this->response = new Response($config);
    }

    public function storedata(){
        #---copy code start----
        $request = \Config\Services::request();
        $rules = [
            'firstname' => 'required|min_length[3]|max_length[20]',
            'lastname' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|',
            'password' => 'required|min_length[8]|max_length[255]',
            'password_confirm' => 'matches[password]',
            'email' => 'required',
            
        ];
        $errors = [];
        //Sesuaikan lagi dibawah 
        $validation = \Config\Services::validation();
        $validation->setRules($rules, $errors);
        $validation->withRequest($request)->run();
        $validationErrors = $validation->getErrors();

        

        if (!empty($validationErrors)) {
            $data['validation'] = $validation;
            return $this->setResponse(UtilsResponseLib::$NOTALLOWED, $data);
        } else {
            $scheduleModel = new UsersModel();
            $newData = [
                'firstname' => $request->getVar('firstname'),
                'lastname' => $request->getVar('lastname'),
                'email' => $request->getVar('email'),
                'password' => $request->getVar('password'),
                'role' => $request->getVar('role'),
                
            ];
            $idcheck = $request->getVar('id');
            if($idcheck){
                $newData['id'] = $request->getVar('id');
            }
            $data = $scheduleModel->save($newData);
            if($request->getVar('id')){
                $eid = $request->getVar('id');    
            }else{
                $eid = $scheduleModel->insertID;
            }
            /*echo '<pre>';
            echo $eid.'<br>';
            print_r($data);
            echo '</pre>';*/
            #die('SKIP');   
            //$this->savePhoto($eid);

            if ($data) {
                session()->setFlashdata('success', lang('MasterUsers.register.created'));
                return $this->setResponse(UtilsResponseLib::$SUCCESS, $data);
            } else {
                $data['errormessaje'] = 'Undefined';
                return $this->setResponse(UtilsResponseLib::$SERVERERROR, $data);
            }
        }
        #----------------------

    }

    public function getroleselect(){
        $roleModel = new MasterUsersModel();
        return $roleModel->select('id_role, role')->get()->getResult();
    }

}