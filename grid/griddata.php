<?php
/**
 * Datasource, 
 * 
 * Classes and methods for grid data
 * @author Anshul Meena <anshul.meena@hclirary.org>
 * @version 1.0
 * @package Data Source
 */
	require_once '../classes/adodb.inc.php';
/**
 * Class for creating table with Data
 * @param string table name or sql query
 * @return ArrayObject
 */
class grid_data{
	private $tablename;
	private $mode;
	private $query;
	
	/**
	 * html code for tabel functionk
	 * @global string database connection string comming soon
	 * @param string $dbtable table name
	 * @param string $sqlquery optional sql query
	 * @return sting table html
	 */
	function html_table_data($dbtable, $sqlquery = NULL){
		$i = 1;
		$db = ADONewConnection('mysql'); 
	    $db->debug = true; 
	    $db->Connect('localhost', 'x', 'x', 'x'); 
	    if(!$db)
	    	die("Database conn failed");
	    	
	    $rs = $db->GetAssoc("select * from $dbtable");
	    if (!$rs) {
	    	die("Sql statement error");
	    } 
	    print ("<div id=\"demo\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"display\" id=\"example\">
		<thead>
			<tr>
				<th>ID</th>
				<th>School</th>
				<th>Level</th>
				<th>Enrollment</th>
			</tr>
		</thead><tbody>");
	    foreach ($rs as $row){
	    	echo("<tr  id=\"$i\" class=\"gradeA\"><td>".
	    	$row['id']."</td><td>".$row['school']."</td><td class=\"center\">".
	    	$row['level']."</td><td class=\"center\">".$row['enrollment']."</td>
			</tr>");
	    	$i++;	    		
	    }
		    echo ("</tbody>
					<tfoot>
					<tr>
						<th>ID</th>
						<th>School</th>
						<th>Level</th>
						<th>Enrollment</th>	
					</tr>
					</tfoot>
					</table>
				</div>");
	    $db->Close();
	}
}
?>