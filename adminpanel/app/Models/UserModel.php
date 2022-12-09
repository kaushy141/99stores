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
		return $this->db->table($this->table)->select('*')->getWhere(['id' => $user_id])->getRowArray();
	}
}
?>