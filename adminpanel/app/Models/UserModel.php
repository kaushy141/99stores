<?php
namespace App\Models;
use App\Models\MyModel;

class UserModel extends MyModel {

	protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['type', 'fname', 'mname', 'lname', 'email', 'mobile', 'password', 'address', 'city', 'state', 'country', 'image', 'email_verified', 'mobile_verified', 'charges', 'updated_date', 'deleted_date', 'status'];
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

	public function logLogin($request, $user_id)
	{
		$builder = $this->db->table("log_login");
		$builder->insert(["user_id" => $user_id, "device" => $this->getDevice($request), "ip_address" => $_SERVER['REMOTE_ADDR'], "session_id" => session_id() ]);
		return $this->db->insertID();
	}
	public function logLogout($logLogin)
	{
		$builder = $this->db->table("log_login");
		$builder->where(["id" => $logLogin]);
		$builder->update(["logout_time" => date('Y-m-d H:i:s')]);
		//echo $this->db->getLastQuery();die;
	}	

	public function addActivity($request, $user_id, $content, $title=null, $variant='default', $link=null)
	{
		$builder = $this->db->table("activity");
		$builder->insert(["user_id" => $user_id, "title" => $title, "content" => $content, "variant" => $variant, "link" => $link, "ip_address" => $_SERVER['REMOTE_ADDR'], "device" => $this->getDevice($request) ]);
		///echo $this->db->getLastQuery();die;
	}
	
	public function getList($type=0)
	{
		$builder = $this->db->table($this->table);
		$builder->select("{$this->table}.id, {$this->table}.fname, {$this->table}.mname, {$this->table}.lname, {$this->table}.email, {$this->table}.mobile, {$this->table}.created_date, {$this->table}.status, user_types.type_name");
		$builder->join("user_types", "user_types.type_id = {$this->table}.type");
		if($type)
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

	public function getStatesList()
	{
		$builder = $this->db->table("states");
		$builder->select("id, name");
		$builder->where("status", 1);
		$builder->orderBy("name");
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function getUserSkills($user_id){		
		$builder = $this->db->table("user_skills");
		$builder->select("skill_id");
		$builder->where("user_id", $user_id);
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		return $query->getResultArray();
	}

	public function getUserIdentities($user_id, $identity_id=0){
		$builder = $this->db->table("user_identities");
		$builder->select("identity_id, identity_value");
		$builder->where("user_id", $user_id);
		if($identity_id)
		$builder->where("identity_id", $identity_id);
		$builder->orderBy("modified_date", "DESC");
		$query = $builder->get();
		return $query->getFirstRow('array');
	}

	public function getUserAddress($user_id, $address_id=0){
		$builder = $this->db->table("address");
		$builder->select("*");
		$builder->where("user_id", $user_id);
		if($address_id)
		$builder->where("id", $address_id);
		$builder->orderBy("created_date", "DESC");
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		if($address_id)
		return $query->getFirstRow('array');
		else
		return $query->getResultArray();
	}
		
	public function saveSkills($user_id, $skills)
	{
		$availableSkills = $this->getSkillsList();		
		$userSkills =  $this->getUserSkills($user_id);
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
	
	public function saveIdentities($user_id, $identity_id, $identity_value)
	{		
		$userIdentities =  $this->getUserIdentities($user_id, $identity_id);
		
		if($userIdentities && $userIdentities['identity_value'] != $identity_value){
			$builder = $this->db->table("user_identities");
			$builder->update(['value' => $identity_value]);
			$builder->where(["identity_id" => $identity_id, "user_id" => $user_id ]);
		}
		else{
			$builder = $this->db->table("user_identities ");
			$builder->insert(["identity_id" => $identity_id, "user_id" => $user_id , "identity_value" => $identity_value ]);
		}		
	}
	
	public function saveAddress($user_id, $line1, $line2, $district, $state, $country, $pincode)
	{
		$userAddressArray = ["user_id" => $user_id, "line1" => $line1, "line2" => $line2, "district" => $district, "state" => $state, "country" => $country, "pincode" => $pincode];
		$builder = $this->db->table("address ");
		$builder->select("id");
		$builder->where($userAddressArray);
		$query = $builder->get();
		$userAddress =  $query->getFirstRow('array');
		
		if($userAddress){
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