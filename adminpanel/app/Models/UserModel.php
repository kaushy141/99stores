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
		return $query->getFirstRow('array');
	}
	
	public function getList($type)
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.id, {$this->table}.fname, {$this->table}.mname, {$this->table}.lname, {$this->table}.email, {$this->table}.mobile, {$this->table}.created_date, {$this->table}.status, user_types.type_name");
		$builder->join("user_types", "user_types.type_id = {$this->table}.type");
		$builder->where("{$this->table}.type", $type);
		$query = $builder->get();
		return $query->getResultArray();
	}
	
	public function getSkillsList()
	{
		$builder = $this->db->table("skills");
		$builder->select("id, name");
		$builder->where("status", 1);
		$builder->orderBy("name");
		$query = $builder->get();
		return $query->getResultArray();
	}
	
	public function getIdentitiesList()
	{
		$builder = $this->db->table("identities");
		$builder->select("id, name");
		$builder->where("status", 1);
		$builder->orderBy("name");
		$query = $builder->get();
		return $query->getResultArray();
	}	
	
	public function saveSkills($user_id, $skills)
	{
		$availableSkills = $this->getSkillsList();
		
		$builder = $this->db->table("user_skills");
		$builder->select("skill_id");
		$builder->where("user_id", $user_id);
		$builder->orderBy("modified_date");
		$query = $builder->get();
		$userSkills =  $query->getResultArray();
		
		$newSkills = array_diff($skills, array_column($userSkills, 'skill_id'));
		$deleteSkills = array_diff(array_column($userSkills, 'skill_id'), $skills);
		
		foreach($newSkills as $skill_id){
			$builder = $this->db->table("user_skills");
			$builder->insert(["skill_id" => $skill_id, "user_id" => $user_id ]);
		}
		
		foreach($deleteSkills as $skill_id){
			$builder = $this->db->table("user_skills");
			$builder->where('user_id', $user_id);
			$builder->where('skill_id', $skill_id);
			$builder->delete();
		}
	}
	
	public function saveIdentities($user_id, $identity_id, $value)
	{
		$availableIdentities = $this->getIdentitiesList();		
		$builder = $this->db->table("user_identities");
		$builder->select("value");
		$builder->where("user_id", $user_id);
		$builder->where("identity_id", $identity_id);
		$builder->orderBy("modified_date");
		$query = $builder->get();
		$userIdentities =  $query->getFirstRow('array');;
		
		if($userIdentities && $userIdentities['value'] != $value){
			$builder = $this->db->table("user_identities");
			$builder->update(['value' => $value]);
			$builder->where(["identity_id" => $identity_id, "user_id" => $user_id ]);
		}
		else{
			$builder = $this->db->table("user_identities ");
			$builder->insert(["identity_id" => $identity_id, "user_id" => $user_id , "value" => $value ]);
		}		
	}
	
	public function saveAddress($user_id, $line1, $line2, $district, $state, $country, $pincode)
	{
		$availableIdentities = $this->getIdentitiesList();
		$userAddressArray = ["user_id" => $user_id, "line1" => $line1, "line2" => $line2, "district" => $district, "state" => $state, "country" => $country, "pincode" => $pincode];
		$builder = $this->db->table("address ");
		$builder->select("id");
		$builder->where($userAddressArray);
		$query = $builder->get();
		$userAddress =  $query->getFirstRow('array');
		
		if(!$userAddress){
			return $userAddress['id'];			
		}
		else{
			$builder = $this->db->table("address ");
			$builder->insert($userAddressArray);
			return $this->db->insertID();
		}
	}
}
?>