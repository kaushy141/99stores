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

function getFolderName($root='general'){
	$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	return $root.'/'.substr(str_shuffle($chars), 0, 1).'/'.substr(str_shuffle($chars), 0, 1);
}

function imageView($file){

}
?>