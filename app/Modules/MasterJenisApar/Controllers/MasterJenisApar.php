<?php 
namespace MasterJenisApar\Controllers;
use CodeIgniter\Controller;

class MasterJenisApar extends Controller
{
    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        
    }
    
    /**
     * Index
     *
     * @return View
     */
    public function index()
    {
        $data = [];
        helper(['form']);
        
        return view('MasterJenisApar\Views\index', $data);
    }
}
