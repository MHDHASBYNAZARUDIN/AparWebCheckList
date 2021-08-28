<?php
namespace Dashboard\Controllers;
#use App\Controllers\Basecontroller;
use CodeIgniter\Controller;


#class Dashboard extends Controller {
    class Dashboard extends Controller {
        public function __construct()
        {
                
        }
    public function index() {
        $data = [];
        helper(['form']);

       return  view('Dashboard\Views\dashboard', $data);
       
    }

    //--------------------------------------------------------------------
}
