<?php 
namespace TransaksiApar\Models;
use CodeIgniter\Model;

class TransaksiAparModel extends Model 
{
    protected $table = 'TransaksiApar';
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