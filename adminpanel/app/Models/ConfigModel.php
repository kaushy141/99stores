<?php
namespace App\Models;
use App\Models\MyModel;

class UserModel extends MyModel {

	protected $table      = 'config';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $allowedFields = ['key', 'value', 'updated_date'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
	
	
	public function getValue($key)
	{
		$builder = $this->db->table($this->table);
		$builder->select("value");
		$builder->where("key", $key);
		$query = $builder->get();
		if($record = $query->getFirstRow('array'))
			return $record['value'];
		else
			return false;
	}	
			
	public function setValue($key, $value)
	{
		if($this->getValue($key) === false){
			$builder = $this->db->table($this->table);
			$builder->insert(["key" => $key, "value" => $value ]);
		}else{
			$builder = $this->db->table($this->table);
			$builder->update(['value' => $value, 'updated_date' => time()]);
			$builder->where(["key" => $key]);
		}
	}
}
?>