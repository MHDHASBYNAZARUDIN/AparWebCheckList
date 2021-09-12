<?php 
namespace MasterApar\Libraries;
use MasterApar\Models\MasterAparModel;
use MasterApar\Models\TaJenis;
use Utils\Libraries\UtilsResponseLib;
use CodeIgniter\HTTP\Response;
use app\Libraries\Ciqrcode;
use stdClass;

class MasterAparLib {
    use UtilsResponseLib;
    public function __construct() {
        $config = config(App::class);
        $this->response = new Response($config);
        include APPPATH . '/Libraries/Ciqrcode.php';
    }
    
    //public function storedata(){
    //    #---copy code start----
    //    $request = \Config\Services::request();
    //    $rules = [
    //        'lokasi' => 'required|min_length[3]|max_length[20]',
    //        'jenis' => 'required|min_length[3]|max_length[20]',
    //        'masa_berlaku_awal' => 'required|min_length[3]|max_length[20]',
    //        'masa_berlaku_akhir' => 'required|min_length[3]|max_length[20]',
            //'foto' => 'required|jpg,image/jpeg,image/gif,image/png|max_size[2048]',
    //        'Deskripsi' => 'required|min_length[0]|max_length[255]',
    //    ];
    //    $errors = [];

    //    $validation = \Config\Services::validation();
    //    $validation->setRules($rules, $errors);
    //    $validation->withRequest($request)->run();
    //    $validationErrors = $validation->getErrors();

    //    if (!empty($validationErrors)) {
    //        $data['validation'] = $validation;
    //        return $this->setResponse(UtilsResponseLib::$NOTALLOWED, $data);
    //    } else {
    //        $mrolesModel = new MasterAparModel();
    //        $newData = [
    //            'lokasi'      => $request->getVar('lokasi'),
    //            'jenis'   => trim($request->getVar('jenis')),
    //            'masa_berlaku_awal'   => trim($request->getVar('masa_berlaku_awal')),
    //            'masa_berlaku_akhir'   => trim($request->getVar('masa_berlaku_akhir')),
    //            'foto'   => trim($request->getVar('foto')),
    //            'Deskripsi'   => trim($request->getVar('Deskripsi')),
    //        ];
            //save data-------------------
    //        $idcheck = $request->getVar('id_apar');
    //        if($idcheck){
    //            $newData['id_apar'] = $request->getVar('id_apar');
    //        }   
    //        $data = $mrolesModel->save($newData);
    //        if ($data) {
    //            session()->setFlashdata('success', lang('MasterApar.register.created'));
    //            return $this->setResponse(UtilsResponseLib::$SUCCESS, $data);
    //        } else {
    //            $data['errormessaje'] = 'Undefined';
    //            return $this->setResponse(UtilsResponseLib::$SERVERERROR, $data);
    //        }
    //    }
        #----------------------
    //}

    /**
     *Saving data request (Blitar, 03 of August 2021)
     */
    public function storedata(){
        #---copy code start----
        $request = \Config\Services::request();
        $rules = [
            'noperiksa' => 'required',
            'lokasi' => 'required|min_length[3]|max_length[20]',
            'jenis' => 'required',
            'masa_berlaku_awal' => 'required',
            'masa_berlaku_akhir' => 'required',
            'Deskripsi' => 'required',
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
            $scheduleModel = new MasterAparModel();
            $newData = [
                'noperiksa'             => $request->getVar('noperiksa'),
                'lokasi'                => $request->getVar('lokasi'),
                'jenis'              => $request->getVar('jenis'),
                'masa_berlaku_awal'     => $request->getVar('masa_berlaku_awal'),
                'masa_berlaku_akhir'    => $request->getVar('masa_berlaku_akhir'),
                'Deskripsi'             => $request->getVar('Deskripsi'),
            ];
            $idcheck = $request->getVar('id_apar');
            if($idcheck){
                $newData['id_apar'] = $request->getVar('id_apar');
            }
            $data = $scheduleModel->save($newData);
            if($request->getVar('id_apar')){
                $eid = $request->getVar('id_apar');    
            }else{
                $eid = $scheduleModel->insertID;
            }
            /*echo '<pre>';
            echo $eid.'<br>';
            print_r($data);
            echo '</pre>';*/
            #die('SKIP');   
            $this->savePhoto($eid);

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
    /**
     * saving photo 
     */
    private function savePhoto($eid){
        $scheduleModel = new MasterAparModel();

        $request        = \Config\Services::request();
        $file           = $request->getFile('foto');

        if ($file->isValid()){
            $name           = $file->getName();
            $tempfile       = $file->getTempName();
            $ext            = $file->getClientExtension();
            
            $destination    = ROOTPATH.'public/images/';
            $dt             = $scheduleModel->find($eid); 
            if(isset($dt['created_at'])){
                $created    = substr($dt['created_at'],0,10);
                $var        = explode('-',$created);
                if(count($var)==3){
                    if(!file_exists($destination.$var[0])){
                        mkdir($destination.$var[0],0777);
                    }
                    if(!file_exists($destination.$var[0].'/'.$var[1])){
                        mkdir($destination.$var[0].'/'.$var[1],0777);
                    }
                    if(!file_exists($destination.$var[0].'/'.$var[1].'/'.$var[2])){
                        mkdir($destination.$var[0].'/'.$var[1].'/'.$var[2],0777);
                    }

                    $fdestination   = $destination.$var[0].'/'.$var[1].'/'.$var[2];
                    $newName        = $eid.'.'.$ext;  
                    $file->move($fdestination, $newName);
                }         
            }
        }    
    }
    /**
     * Gen QRcode 
     */
    public function genQrcode($eid){
        $ciqrcode       = new Ciqrcode(); 
        $scheduleModel  = new MasterAparModel();
        
        $destination    = ROOTPATH.'public/qrcode/';
        if(!file_exists($destination)){
            mkdir($destination,0777);
        }
        $dt             = $scheduleModel->find($eid); 
        if(isset($dt['created_at'])){
            $created    = substr($dt['created_at'],0,10);
            $var        = explode('-',$created);
            if(count($var)==3){
                if(!file_exists($destination.$var[0])){
                    mkdir($destination.$var[0],0777);
                }
                if(!file_exists($destination.$var[0].'/'.$var[1])){
                    mkdir($destination.$var[0].'/'.$var[1],0777);
                }
                if(!file_exists($destination.$var[0].'/'.$var[1].'/'.$var[2])){
                    mkdir($destination.$var[0].'/'.$var[1].'/'.$var[2],0777);
                }

                $fdestination   = $destination.$var[0].'/'.$var[1].'/'.$var[2].'/';
                $kodeqr         = $dt['id_apar'];  
                
                $params['data']     = $kodeqr;
                $params['level']    = 'H';
                $params['size']     = 10;
                $params['savename'] = $fdestination.$kodeqr.".png";
                /*if(file_exists($fdestination.'/'.$kodeqr.".png")){    
                    unlink($fdestination.'/'.$kodeqr.".png");
                }*/
                $path = $ciqrcode->generate($params);
                $ret  = str_replace(ROOTPATH.'public',base_url(),$path);
                return  $ret;

            }         
        }

    }

    /**
     * select role name  
     */
    public function getjenisselect(){
        $jenisModel = new TaJenis();
        return $jenisModel->select('id_jenis, jenis')->get()->getResult();
    }

    
}