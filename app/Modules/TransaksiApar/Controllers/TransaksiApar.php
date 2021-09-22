<?php 
namespace TransaksiApar\Controllers;
use CodeIgniter\Controller;
use \TransaksiApar\Libraries\TransaksiAparLib;
use \TransaksiApar\Models\TransaksiAparModel;
use \TransaksiApar\Models\KondisiModel;

class TransaksiApar extends Controller
{
    /**
     * Constructor.
     *
     */
    public $TransaksiAparLib;

    public function __construct()
    {
        $this->TransaksiAparLib = new TransaksiAparLib();
        
    }
    
    /**
     * Index
     *
     * @return View
     */
    public function index($noperiksa='')
    {   
        $data  = [];
        helper(['form']);
        $agent = new TransaksiAparModel();
        $reckondisi = new KondisiModel();
        if ($this->request->getMethod() == 'post') {
            $record = $agent->find($noperiksa);
            $apar        = $this->request->getVar('transaksi.noperiksaapar');
            #$records    = $agent->where('nama_biro LIKE \'%'.$nama_biro.'%\'')->findAll();
            $records     = $agent->select('transaksi.id_transaksi,transaksi.kondisifisik,transaksi.kondisipin,
            transaksi.kondisitekanan,transakasi.selang,transaksi.kondisinozzle,transaksi.noperiksaapar,
            transaksi.created_at,transaksi.updated_at,apar.noperiksa,Tkondisi.kondisi')
             ->where('transaksi.noperiksaapar LIKE \'%'.$apar.'%\'')
             ->join('apar','apar.id_apar=transaksi.noperiksaapar','left')
             ->join('Tkondisi','Tkondisi.id_kondisi=transaksi.kondisifisik','left')
             ->findAll($noperiksa);
            
        }else{
            $record = $agent->find($noperiksa);
            //$apar        = $this->request->getVar('transaksi.noperiksaapar');
            if($noperiksa){
                $records     = $agent->select('transaksi.id_transaksi,transaksi.kondisifisik,transaksi.kondisipin,
                        transaksi.kondisitekanan,transaksi.kondisiselang,transaksi.kondisinozzle,transaksi.noperiksaapar,
                        transaksi.created_at,transaksi.updated_at,apar.noperiksa,Tkondisi.kondisi')
                        ->where('transaksi.noperiksaapar='.$noperiksa)
                        ->join('apar','apar.id_apar=transaksi.noperiksaapar','left')
                        ->join('Tkondisi','Tkondisi.id_kondisi=transaksi.kondisifisik','left')
                        ->findAll();
            }else{
                $records     = $agent->select('transaksi.id_transaksi,transaksi.kondisifisik,transaksi.kondisipin,
                        transaksi.kondisitekanan,transaksi.kondisiselang,transaksi.kondisinozzle,transaksi.noperiksaapar,
                        transaksi.created_at,transaksi.updated_at,apar.noperiksa,Tkondisi.kondisi')
                        //->where('transaksi.noperiksaapar LIKE \'%'.$apar.'%\'')
                        ->join('apar','apar.id_apar=transaksi.noperiksaapar','left')
                        ->join('Tkondisi','Tkondisi.id_kondisi=transaksi.kondisifisik','left')
                        ->findAll();
            }
            
            
        }
        $arrkondisi =[];
        $ret =[];
        $arrconditions = $reckondisi->findAll();
        
        foreach ($arrconditions as $k => $v){
            $arrkondisi[$v['id_kondisi']] = $v['kondisi'];
        }
        
        if(count($records) > 0){
            foreach($records as $k => $v){
                $v['kondisipin'] = isset($arrkondisi[$v['kondisipin']])?$arrkondisi[$v['kondisipin']]:'';
                $v['kondisinozzle'] = isset($arrkondisi[$v['kondisinozzle']])?$arrkondisi[$v['kondisinozzle']]:'';
                $v['kondisitekanan'] = isset($arrkondisi[$v['kondisitekanan']])?$arrkondisi[$v['kondisitekanan']]:'';
                $v['kondisiselang'] = isset($arrkondisi[$v['kondisiselang']])?$arrkondisi[$v['kondisiselang']]:'';
                $ret[] = $v;
            }
        }

           /* echo '<pre>';
               echo '<br>';
               print_r($arrconditions);
               print_r($ret);
               echo '</pre>';
               die();*/

        $kondisi = $this->TransaksiAparLib->getkondisiselect($noperiksa);
        $aparselect = $this->TransaksiAparLib->getaparselect();
        $data['pilihapar'] = $aparselect;
        $data['pilih']  = $kondisi;
        $data['reco']   = $ret;
        
        return view('TransaksiApar\Views\viewdetail', $data);
    }

    public function add($id_apar=''){
        $data  = [];
        helper(['form']);
        $oroles = new TransaksiAparModel(); 
        //$Tjenis = new Tajenis;
        if ($this->request->getMethod() == 'post') {
      

            $response = $this->TransaksiAparLib->datastore();
            if ($response->status != \Utils\Libraries\UtilsResponseLib::$SUCCESS) {
                //failed requirement
                $data = $response->error;
                $record = $oroles->find($id_apar);
                $kondisi = $this->TransaksiAparLib->getkondisiselect();
                $noperiksa = $this->TransaksiAparLib->getaparselect($id_apar);
                $data['pilihapar'] = $noperiksa;
                $data['pilih']  = $kondisi;
                $data['mode']    = 'add'.$id_apar;              
                return view('TransaksiApar\Views\index', $data);
            } else {
                //on success 
                return redirect()->to(base_url() . '/transaksiapar/'.$id_apar);
            }
        }else{
            //load edit first time
            $record = $oroles->find($id_apar);
            $kondisi = $this->TransaksiAparLib->getkondisiselect();
            $noperiksa = $this->TransaksiAparLib->getaparselect($id_apar);
            $data['pilihapar'] = $noperiksa;
            $data['pilih']  = $kondisi;   
            $data['mode']    = 'add'.$id_apar;
            return view('TransaksiApar\Views\index', $data);
        }
    }

    

}