<?php
namespace App\Models;
use CodeIgniter\Model;

class MyModel extends Model {

		
	public function getDevice($request)
	{
		$agent = $request->getUserAgent();
		if ($agent->isBrowser()) {
			$currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
		} elseif ($agent->isRobot()) {
			$currentAgent = $agent->getRobot();
		} elseif ($agent->isMobile()) {
			$currentAgent = $agent->getMobile();
		} else {
			$currentAgent = 'Unidentified User Agent';
		}
		return $agent->getPlatform()."|".$currentAgent;
	}	
	
}
?>