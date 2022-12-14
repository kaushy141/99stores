<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {

	protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['type', 'fname', 'mname', 'lname', 'email', 'mobile', 'password', 'address', 'city', 'state', 'country', 'image', 'email_verified', 'mobile_verified', 'updated_date', 'deleted_date', 'status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
    protected $deletedField  = 'deleted_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
	protected $defaultImage     = 'public/img/user_default.png';
	protected $active = 'Active';
	protected $unverified = 'Unverified';
	protected $deleted = 'Deleted';
	
	
	public function get($user_id)
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.*, user_types.type_name");
		$builder->join("user_types", "user_types.type_id = {$this->table}.type");
		$builder->where("{$this->table}.id", $user_id);
		$query = $builder->get();
		//var_dump($this->db);
		//echo $thi->db->getLastQuery();die;
		return $query->getFirstRow('array');
		//return $this->db->table($this->table)->select('*')->getWhere(['id' => $user_id])->getRowArray();
	}
	
	public function getList($type)
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.id, {$this->table}.fname, {$this->table}.mname, {$this->table}.lname, {$this->table}.email, {$this->table}.mobile, {$this->table}.created_date, {$this->table}.status, user_types.type_name");
		$builder->join("user_types", "user_types.type_id = {$this->table}.type");
		$builder->where("{$this->table}.type", $type);
		$query = $builder->get();
		//var_dump($this->db);
		return $query->getResultArray();
	}
}
?>