<?php 
namespace MasterJenisApar\Models;
use CodeIgniter\Model;

class Jenis extends Model 
{
    protected $table = 'jenis';
    protected $primaryKey = 'idjenis';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenisapar'];
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