<?php 
namespace TransaksiApar\Controllers;
use CodeIgniter\Controller;

class TransaksiApar extends Controller
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
        
        return view('TransaksiApar\Views\index', $data);
    }
}
