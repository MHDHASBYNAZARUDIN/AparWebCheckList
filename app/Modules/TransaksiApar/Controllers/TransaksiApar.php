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
    public function index()
    {   
        $data  = [];
        helper(['form']);
        $agent = new TransaksiAparModel();
        $reckondisi = new KondisiModel();
        if ($this->request->getMethod() == 'post') {
            $apar        = $this->request->getVar('transaksi.created_at');
            #$records    = $agent->where('nama_biro LIKE \'%'.$nama_biro.'%\'')->findAll();
            $records     = $agent->select('transaksi.id_transaksi,transaksi.kondisifisik,transaksi.kondisipin,
            transaksi.kondisitekanan,transakasi.selang,transaksi.kondisinozzle,transaksi.noperiksaapar,
            transaksi.created_at,transaksi.updated_at,apar.noperiksa,Tkondisi.kondisi')
             ->where('transaksi.created_at LIKE \'%'.$apar.'%\'')
             ->join('apar','apar.id_apar=transaksi.noperiksaapar','left')
             ->join('Tkondisi','Tkondisi.id_kondisi=transaksi.kondisifisik','left')
             ->findAll();
            
        }else{
            $apar        = $this->request->getVar('transaksi.created_at');
            $records     = $agent->select('transaksi.id_transaksi,transaksi.kondisifisik,transaksi.kondisipin,
            transaksi.kondisitekanan,transaksi.kondisiselang,transaksi.kondisinozzle,transaksi.noperiksaapar,
            transaksi.created_at,transaksi.updated_at,apar.noperiksa,Tkondisi.kondisi')
             ->where('transaksi.created_at LIKE \'%'.$apar.'%\'')
             ->join('apar','apar.id_apar=transaksi.noperiksaapar','left')
             ->join('Tkondisi','Tkondisi.id_kondisi=transaksi.kondisifisik','left')
             ->findAll();
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

        $kondisi = $this->TransaksiAparLib->getkondisiselect();
        $aparselect = $this->TransaksiAparLib->getaparselect();
        $data['pilihapar'] = $aparselect;
        $data['pilih']  = $kondisi;
        $data['reco']   = $ret;
        
        return view('TransaksiApar\Views\viewdetail', $data);
    }

    public function add(){
        $data  = [];
        helper(['form']);
        $oroles = new TransaksiAparModel(); 
        //$Tjenis = new Tajenis;
        if ($this->request->getMethod() == 'post') {
      

            $response = $this->TransaksiAparLib->datastore();
            if ($response->status != \Utils\Libraries\UtilsResponseLib::$SUCCESS) {
                //failed requirement
                $data = $response->error;
                $kondisi = $this->TransaksiAparLib->getkondisiselect();
                $noperiksa = $this->TransaksiAparLib->getaparselect($id_apar);
                $data['pilihapar'] = $noperiksa;
                $data['pilih']  = $kondisi;
                $data['mode']    = 'add';              
                return view('TransaksiApar\Views\index', $data);
            } else {
                //on success 
                return redirect()->to(base_url() . '/transaksiapar');
            }
        }else{
            //load edit first time
            $kondisi = $this->TransaksiAparLib->getkondisiselect();
            $noperiksa = $this->TransaksiAparLib->getaparselect();
            $data['pilihapar'] = $noperiksa;
            $data['pilih']  = $kondisi;   
            $data['mode']    = 'add';
            return view('TransaksiApar\Views\index', $data);
        }
    }

    

}