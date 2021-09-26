<?php 
namespace MasterJenisApar\Models;
use CodeIgniter\Model;

class MasterJenisAparModel extends Model 
{
    protected $table = 'jenis';
    protected $allowedFields = [];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    
    public function __construct()
    {
        parent::__construct();
    }
    
    protected function beforeInsert(array $data) {
        return $data;
    }

    protected function beforeUpdate(array $data) {
        return $data;
    }
}