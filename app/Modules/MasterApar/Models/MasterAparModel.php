<?php 
namespace MasterApar\Models;
use CodeIgniter\Model;

class MasterAparModel extends Model 
{
    protected $table = 'apar';
    protected $primaryKey = 'id_apar';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['lokasi','jenis','masa_berlaku_awal','masa_berlaku_akhir','foto','Deskripsi'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getGambar()
    {
        return $this->findAll();  
    }
    
    protected function beforeInsert(array $data) {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function beforeUpdate(array $data) {
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
    
}