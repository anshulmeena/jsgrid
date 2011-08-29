<?php

	require_once 'systemdata.php';
	
	if(isset($_POST['row_id']) && isset($_POST['value']) && isset($_POST['column']) && ($_POST['action'] == 'ajax')){
		
		$ajaxcall_obj = new ajaxcall();
		$id = mysql_real_escape_string($_POST['row_id']);
		$value = mysql_real_escape_string($_POST['value']);
		$column = mysql_real_escape_string($_POST['column']);
		$tablename = mysql_real_escape_string($_POST['table_name']);
		
		$columns = array( 0 => 'id', 1 => 'school', 2 => 'level', 3 => 'enrollment');
		
		$updatesql = "update $tablename set $columns[$column] = '$value' where id = $id";
		
		$ajaxcall_obj->consummer->Execute($updatesql);
		
		echo $value;
		
		$ajaxcall_obj->consummer->Close();
	}else 
		die("Error: Ajax call error.");

?>