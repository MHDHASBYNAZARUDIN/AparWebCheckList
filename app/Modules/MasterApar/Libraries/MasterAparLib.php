<?php 
namespace MasterApar\Libraries;
use MasterApar\Models\MasterAparModel;
use Utils\Libraries\UtilsResponseLib;
use CodeIgniter\HTTP\Response;
use stdClass;

class MasterAparLib {
    use UtilsResponseLib;
    public function __construct() {
        $config = config(App::class);
        $this->response = new Response($config);
    }

    public function storedata(){
        #---copy code start----
        $request = \Config\Services::request();
        $rules = [
            'lokasi' => 'required|min_length[3]|max_length[20]',
            'jenis' => 'required|min_length[3]|max_length[20]',
            'masa_berlaku_awal' => 'required|min_length[3]|max_length[20]',
            'masa_berlaku_akhir' => 'required|min_length[3]|max_length[20]',
            //'foto' => 'required|jpg,image/jpeg,image/gif,image/png|max_size[2048]',
            'Deskripsi' => 'required|min_length[0]|max_length[255]',
        ];
        $errors = [];

        $validation = \Config\Services::validation();
        $validation->setRules($rules, $errors);
        $validation->withRequest($request)->run();
        $validationErrors = $validation->getErrors();

        if (!empty($validationErrors)) {
            $data['validation'] = $validation;
            return $this->setResponse(UtilsResponseLib::$NOTALLOWED, $data);
        } else {
            $mrolesModel = new MasterAparModel();
            $newData = [
                'lokasi'      => $request->getVar('lokasi'),
                'jenis'   => trim($request->getVar('jenis')),
                'masa_berlaku_awal'   => trim($request->getVar('masa_berlaku_awal')),
                'masa_berlaku_akhir'   => trim($request->getVar('masa_berlaku_akhir')),
                'foto'   => trim($request->getVar('foto')),
                'Deskripsi'   => trim($request->getVar('Deskripsi')),
            ];
            //save data-------------------
            $idcheck = $request->getVar('id_apar');
            if($idcheck){
                $newData['id_apar'] = $request->getVar('id_apar');
            }   
            $data = $mrolesModel->save($newData);
            if ($data) {
                session()->setFlashdata('success', lang('MasterApar.register.created'));
                return $this->setResponse(UtilsResponseLib::$SUCCESS, $data);
            } else {
                $data['errormessaje'] = 'Undefined';
                return $this->setResponse(UtilsResponseLib::$SERVERERROR, $data);
            }
        }
        #----------------------
    }
}