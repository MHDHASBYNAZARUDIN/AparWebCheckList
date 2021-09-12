<?php 
namespace TransaksiApar\Controllers;
use CodeIgniter\Controller;
use \TransaksiApar\Libraries\TransaksiAparLib;
use \TransaksiApar\Models\TransaksiAparModel;

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
        if ($this->request->getMethod() == 'post') {
            $apar        = $this->request->getVar('created_at');
            #$records    = $agent->where('nama_biro LIKE \'%'.$nama_biro.'%\'')->findAll();
            $records     = $agent->select('transaksi.id_transaksi,transaksi.kondisifisik,transaksi.kondisipin,
            transaksi.kondisitekanan,transaksi.kondisiselang,transaksi.kondisinozzle,transaksi.id_apar,
            transaksi.created_at,transaksi.updated_at,apar.noperiksa,Tkondisi.kondisi')
                            ->where('created_at LIKE \'%'.$apar.'%\'')
                            ->join('Tkondisi','Tkondisi.id_kondisi=transaksi.kondisifisik','left')
                            ->join('apar','apar.id_apar=transaksi.id_apar','left')
                            ->findAll();
            
        }else{
            $records    = $agent->findAll();
            #$records     = $agent;
        }

        $kondisi = $this->TransaksiAparLib->getkondisiselect();
        $noperiksa = $this->TransaksiAparLib->getaparselect();
        $data['pilihapar'] = $noperiksa;
        $data['pilih']  = $kondisi;
        $data['reco']    = $records;
        //echo '<pre>';
        //echo '<br>';
        //print_r($kondisi);
        //echo '</pre>';
        //die();
        //$data           = [];
    
        
        
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
                $noperiksa = $this->TransaksiAparLib->getaparselect();
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