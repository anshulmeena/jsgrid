<?php
	require_once 'systemdata.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			
		<title>HCPSS Enrollment 2011</title>
		<style type="text/css" title="currentStyle">
			@import "../datatable/media/css/demo_page.css";
			@import "../datatable/media/css/demo_table.css";
			@import "../datatable/examples/examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css";
		</style>

		<script type="text/javascript" language="javascript" src="../datatable/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="../datatable/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="../datatable/examples/examples_support/jquery.jeditable.js"></script>
		<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			/* Init DataTables with footer navigation */
			var oTable = $('#example').dataTable({
				"sPaginationType": "full_numbers",
				"aoColumnDefs": [
									{ "bSortable": false, "aTargets": [ 0 ] }
								],
								"aaSorting": [[ 0, 'asc' ]],
				"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
					/*
					 * Calculate the total Cnrollment for all Schools
					 */
					var iTotalMarket = 0;
					for ( var i=0 ; i<aaData.length ; i++ )
					{
						iTotalMarket += aaData[i][3]*1;
					}
					/* Modify the footer th tag to show total */
					//var nCells = nRow.getElementsByTagName('th');uncomment these line for total in footer
					//nCells[1].innerHTML = iTotalMarket;
				}
			});
			
			/* Apply the jEditable handlers to the table */
			$('td', oTable.fnGetNodes()).editable( 
				'editable_ajax.php', {"callback": function( sValue, y ) 
				{var aPos = oTable.fnGetPosition( this );
				oTable.fnUpdate( sValue, aPos[0], aPos[1] );},
				"submitdata": function ( value, settings ) {
					return {
						"action":'ajax',
						"table_name":'schools_old',
						"id": this.parentNode.getAttribute('id'),
						"row_id": this.parentNode.getAttribute('id'),
						"column": oTable.fnGetPosition( this )[2]
					};
				},
				"height": "14px"
			} );
		} );
		</script>
	</head>
	<body id="dt_example" class="ex_highlight_row">
		<div id="container">
			<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<?php
				 $basic_grid_obj = new consummer_reader();
				 $basic_grid_obj->htmldata('schools_old') 
				?>
				</table>
			</div>
		</div>
		<div class="spacer"></div>
	</body>
</html>