<?php 

require 'conn.inc'; 

$page_id = $_POST["page_id"];
$page_description = $_POST["page_description"];
$page_body = $_POST["page_body"];


$updateStatement = "UPDATE apb_pages SET page_description='" . $page_description . "', page_body='" . $page_body ."' WHERE page_id='" . $page_id . "';";

try
{
	$db->exec($updateStatement);
	header("location: apb.php");
}
catch (Exception $e)
{
	echo ($e->getMessage());
	echo ($updateStatement);
}


?>

