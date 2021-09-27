<?php 
namespace MasterApar\Models;
use CodeIgniter\Model;

class TaJenis extends Model 
{
    protected $table = 'Tjenis';
    protected $primaryKey = 'id_jenis';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenis','status'];
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