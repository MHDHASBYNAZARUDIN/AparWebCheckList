<?php 
namespace TransaksiApar\Libraries;
use TransaksiApar\Models\TransaksiAparModel;
use TransaksiApar\Models\KondisiModel;
use Utils\Libraries\UtilsResponseLib;
use CodeIgniter\HTTP\Response;

class TransaksiAparLib {

    public function __construct() {
        $config = config(App::class);
        $this->response = new Response($config);
    }

    public function storedata(){
        #---copy code start----
        $request = \Config\Services::request();
        $rules = [
            'noperiksa'             => 'required',
            'lokasi'                => 'required|min_length[3]|max_length[20]',
            'jenis'                 => 'required',
            'masa_berlaku_awal'     => 'required',
            'masa_berlaku_akhir'    => 'required',
            'Deskripsi'             => 'required|min_length[0]|max_length[255]',
            'kondisifisik'          => 'required',
            'kondisipin'            => 'required',
            'kondisitekanan'        => 'required',
            'kondisinozzle'         => 'required',
            'kondisiselang'         => 'required',
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
                'noperiksa'             => $request->getVar('noperiksa'),
                'lokasi'                => $request->getVar('lokasi'),
                'jenis'                 => $request->getVar('jenis'),
                'masa_berlaku_awal'     => $request->getVar('masa_berlaku_awal'),
                'masa_berlaku_akhir'    => $request->getVar('masa_berlaku_akhir'),
                'Deskripsi'             => $request->getVar('Deskripsi'),
                'kondisifisik'          => $request->getVar('kondisifisik'),
                'kondisipin'            => $request->getVar('kondisipin'),
                'kondisitekanan'        => $request->getVar('kondisitekanan'),
                'kondisinozzle'         => $request->getVar('kondisinozzle'),
                'kondisiselang'         => $request->getVar('kondisiselang'),
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
            $this->savePhoto($eid);

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
}