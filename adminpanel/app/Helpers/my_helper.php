<?php
//user status class for color
function statusClass($status)
{
	$statusColorArray = [
		'Active' => 'success',
		'Unverified' => 'warning',
		'Deleted' => 'danger'
	];

    return isset($statusColorArray[$status])?$statusColorArray[$status]:"primary";
}

function dateView($timestamp, $format = 'D, dM-Y'){
	return date($format, strtotime($timestamp));
}

?>