<?php 

require 'conn.inc'; 

$page_id = $_POST["page_id"];
$page_description = $_POST["page_description"];
$page_body = $_POST["page_body"];

$insertStatement = "INSERT INTO apb_pages (page_id,page_description,page_body) VALUES ('$page_id','$page_description','$page_body');";

try
{
	$db->exec($insertStatement);
	header("location: apb.php");
}
catch (Exception $e)
{
	echo ($e->getMessage());
	echo ($insertStatement);
}


?>

