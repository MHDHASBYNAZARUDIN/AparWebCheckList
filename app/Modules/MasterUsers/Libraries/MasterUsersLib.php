<?php
namespace MasterUsers\Libraries;
use Users\Models\UsersModel;
use MasterUsers\Models\MasterUsersModel;
use Utils\Libraries\UtilsResponseLib;
use CodeIgniter\HTTP\Response;

class MasterUsersLib {

    use UtilsResponseLib;
    public function __construct() {
        $config = config(App::class);
        $this->response = new Response($config);
    }

    public function storedata() {
        $request = \Config\Services::request();
        $id = $request->getVar('id');
        if ($id){
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                #'password' => 'required|min_length[8]|max_length[255]',
               #'password_confirm' => 'matches[password]',
                'role' => 'required',
            ];
           # die('yy');
        }else{
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
                'role' => 'required',
            ];
        }
        
        $errors = [];

        $validation = \Config\Services::validation();
        $validation->setRules($rules, $errors);
        $validation->withRequest($request)->run();
        $validationErrors = $validation->getErrors();

        if (!empty($validationErrors)) {
            /*echo '<pre>';
            print_r($validationErrors);
            die('yy');*/
            $data['validation'] = $validation;
            return $this->setResponse(UtilsResponseLib::$NOTALLOWED, $data);
        } else {
            $usersModel = new UsersModel();
            $newData = [
                'firstname' => $request->getVar('firstname'),
                'lastname' => $request->getVar('lastname'),
                'email' => $request->getVar('email'),
                'password' => $request->getVar('password'),
                'role'  => $request->getVar('role'),
            ];

            $id = $request->getVar('id');
            if ($id){
                $newData['id'] = $id;
            }
               /*echo '<pre>';
               echo '<br>';
               print_r($newData);
               echo '</pre>';
               die();*/
            $data = $usersModel->save($newData);
            if ($data) {
                session()->setFlashdata('success', lang('MasterUsers.register.created'));
                return $this->setResponse(UtilsResponseLib::$SUCCESS, $data);
            } else {
                $data['errormessaje'] = 'Undefined';
                return $this->setResponse(UtilsResponseLib::$SERVERERROR, $data);
            }
        }
    }

    public function getroleselect(){
        $roleModel = new MasterUsersModel();
        return $roleModel->select('id_role, role')->get()->getResult();
    }
           
}
