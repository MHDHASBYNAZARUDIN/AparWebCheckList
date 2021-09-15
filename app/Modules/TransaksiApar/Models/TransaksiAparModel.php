<?php 
namespace TransaksiApar\Models;
use CodeIgniter\Model;

class TransaksiAparModel extends Model 
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kondisifisik','kondisipin','kondisitekanan',
                                'kondisinozzle','kondisiselang','noperiksaapar'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    
    public function __construct()
    {
        parent::__construct();
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