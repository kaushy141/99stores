<?php
namespace App\Models;
use CodeIgniter\Model;

class StoreModel extends Model {

	protected $table      = 'store';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['name', 'mobile', 'dealer', 'image', 'about', 'line1', 'line2', 'city', 'district', 'state', 'country', 'position', 'modified_date', 'deleted_date', 'status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
    protected $deletedField  = 'deleted_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
	protected $defaultImage     = 'public/img/store_default.png';
	
	
	public function get($user_id)
	{
		$builder = $this->db->table($this->table);
		$builder->select("*");
		$builder->where("{$this->table}.id", $user_id);
		$query = $builder->get();
		return $query->getFirstRow('array');
	}
	
	public function getList()
	{
		$builder = $this->db->table($this->table);
		$builder->select("*");
		$query = $builder->get();
		return $query->getResultArray();
	}	
}
?>