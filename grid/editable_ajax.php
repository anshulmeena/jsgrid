<?php

	require_once '../classes/adodb.inc.php';
	$db = ADONewConnection('mysql'); 
	$db->debug = true; 
    $db->Connect('localhost', 'x', 'x', 'x'); 
    if(!$db)
    	die("Database conn failed");
	
	if(isset($_POST['row_id']) && isset($_POST['value']) && isset($_POST['column'])){

		$id = $_POST['row_id'];
		$value = $_POST['value'];
		$column = $_POST['column'];
		
		$columns = array( 0 => 'id', 1 => 'school', 2 => 'level', 3 => 'enrollment');
		$data = array($columns[$column] => $value);

		$updatesql = "update schools set $columns[$column] = '$value' where id = $id";
		
		$db->Execute($updatesql);

		echo $value;
	}else 
		die("Error: Ajax call");
	
	$db->Close();
?>