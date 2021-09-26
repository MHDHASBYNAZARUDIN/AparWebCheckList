<?php 
namespace MasterUsers\Models;
use CodeIgniter\Model;

class MasterUsersModel extends Model 
{
    protected $table = 'Role';
    protected $primaryKey = 'id_role';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['role'];
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