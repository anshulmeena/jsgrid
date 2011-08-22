<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico" />
		
		<title>DataTables example</title>
		<style type="text/css" title="currentStyle">
			@import "../datatable/media/css/demo_page.css";
			@import "../datatable/media/css/demo_table.css";
			@import "../datatable/extras/TableTools/media/css/TableTools.css";
			@import "../datatable/examples/examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css";
		</style>
		<script type="text/javascript" language="javascript" src="../datatable/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="../datatable/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="../datatable/extras/TableTools/media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="../datatable/extras/TableTools/media/js/TableTools.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable({
					"sPaginationType": "full_numbers",
					"sDom": 'T<"clear">lfrtip',
					"oTableTools": {
						"aButtons": [
								"copy",
								"print",
								{
									"sExtends":    "collection",
									"sButtonText": "Save",
									"aButtons":    [ "csv", "xls", "pdf" ]
								}
							],
						"sSwfPath": "../datatable/extras/TableTools/media/swf/copy_cvs_xls_pdf.swf"
					}
					});
			});
		</script>
	</head>
	<body id="dt_example">
		<div id="container">
			<?php
			//data source file
			 require 'griddata.php';
			 //obj for the datagrid class
			 $dataObj = new grid_data();
			 //html for table with data
			 $dataObj->html_table_data("schools"); 
			?>
		</div>
		<div class="spacer"></div>
	</body>
</html>