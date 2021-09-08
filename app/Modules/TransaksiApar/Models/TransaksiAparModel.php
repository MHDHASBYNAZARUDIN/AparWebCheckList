<?php 
namespace TransaksiApar\Models;
use CodeIgniter\Model;

class TransaksiAparModel extends Model 
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['noperiksa','lokasi','jenis','masa_berlaku_awal','masa_berlaku_akhir',
                                'foto','Deskripsi','kondisifisik','kondisipin','kondisitekanan',
                                'kondisinozzle','kondisiselang'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    
    public function __construct()
    {
        parent::__construct();
    }
    
    protected function beforeInsert(array $data) {
        $data['data']['dibuat'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function beforeUpdate(array $data) {
        $data['data']['diedit'] = date('Y-m-d H:i:s');
        return $data;
    }
}