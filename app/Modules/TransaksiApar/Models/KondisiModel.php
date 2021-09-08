<?php 
namespace TransaksiApar\Models;
use CodeIgniter\Model;

class KondisiModel extends Model 
{
    protected $table = 'Tkondisi';
    protected $primaryKey = 'id_kondisi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kondisi'];
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