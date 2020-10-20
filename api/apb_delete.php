<?php 

require 'conn.inc';

$page_id = $_POST["page_id"];

$deleteStatement = "DELETE FROM apb_pages WHERE page_id = '" . $page_id . "'";

try
{
	$db->exec($deleteStatement);
	header("location: apb.php");
}
catch (Exception $e)
{
	echo ($e->getMessage());
}	
?>
