<?php 
namespace TransaksiApar\Libraries;
use TransaksiApar\Models\TransaksiAparModel;
use MasterApar\Models\MasterAparModel;
use TransaksiApar\Models\KondisiModel;
use Utils\Libraries\UtilsResponseLib;
use CodeIgniter\HTTP\Response;

class TransaksiAparLib {
    use UtilsResponseLib;
    public function __construct() {
        $config = config(App::class);
        $this->response = new Response($config);
    }

    public function datastore(){
        #---copy code start----
        $request = \Config\Services::request();
        $rules = [
            'kondisifisik'          => 'required',
            'kondisipin'            => 'required',
            'kondisitekanan'        => 'required',
            'kondisinozzle'         => 'required',
            'kondisiselang'         => 'required',
            'noperiksaapar'          => 'required',
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
            $scheduleModel = new TransaksiAparModel();
            $newData = [
                'kondisifisik'          => $request->getVar('kondisifisik'),
                'kondisipin'            => $request->getVar('kondisipin'),
                'kondisitekanan'        => $request->getVar('kondisitekanan'),
                'kondisinozzle'         => $request->getVar('kondisinozzle'),
                'kondisiselang'         => $request->getVar('kondisiselang'),
                'noperiksaapar'         => $request->getVar('noperiksaapar'),
            ];
            $idcheck = $request->getVar('id_transaksi');
            if($idcheck){
                $newData['id_transaksi'] = $request->getVar('id_transaksi');
            }
            $data = $scheduleModel->save($newData);
            if($request->getVar('id_transaksi')){
                $eid = $request->getVar('id_transaksi');    
            }else{
                $eid = $scheduleModel->insertID;
            }
            /*echo '<pre>';
            echo $eid.'<br>';
            print_r($data);
            echo '</pre>';*/
            #die('SKIP');   
            #$this->savePhoto($eid);

            if ($data) {
                session()->setFlashdata('success', lang('TransaksiApar.register.created'));
                return $this->setResponse(UtilsResponseLib::$SUCCESS, $data);
            } else {
                $data['errormessaje'] = 'Undefined';
                return $this->setResponse(UtilsResponseLib::$SERVERERROR, $data);
            }
        }

   }

    public function getkondisiselect(){
        $kondisiModel = new KondisiModel();
        return $kondisiModel->select('id_kondisi, kondisi')->get()->getResult();
    }

    public function getaparselect(){
        $aparModel = new MasterAparModel();
        return $aparModel->select('id_apar, noperiksa')->get();
    }
}