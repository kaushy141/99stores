<?php
namespace App\Models;
use CodeIgniter\Model;

class VerificationModel extends Model {

	protected $table      = 'user_verification';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['user_id', 'type', 'token', 'created_date', 'validation_date', 'status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_date';
    protected $updatedField  = 'validation_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
	
	public static $verificationTypeMail     = 'Mail';
	public static $verificationTypeMobile     = 'Mobile';
		
	public function getLink($user_id, $type='Mail') 
	{
		$tokenData = array(
			'user_id' 	=> $user_id,
			'type' 		=> $type,
			'token' 	=> md5($user_id.$type.time()),
			'status' 	=> 1
		);			
		if($user_id = $this->insert($tokenData)){
			return base_url('auth/verification/'.$tokenData['token']);
		}else{
			return null;
		}
	}	

	public function check($token)
	{
		return $this->db->table($this->table)->select('*')->getWhere(['token' => $token, 'status' => 1])->getRowArray();
	}
}
?>