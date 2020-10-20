
<?php require 'data-layer.php'; ?>

<?php

try {

	//$db = new PDO('sqlite:../db/apb.sqlite');
	$query = "SELECT page_body FROM apb_pages WHERE page_id ='" . $_GET["page_id"] . "'";
	$stmt = $db->prepare($query);
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$output = array('pagebody' => $result);

	header('Content-Type: application/json');
	print(json_encode($output));
} 
catch (PDOException $e) {
	echo "Exception:" + $e->getMessage();
}




if (isset($_GET['debug'])) {
	echo ("<br><br><br><br><br><br>");
	echo ("<hr> <b>DEBUG INFO</b> <hr>");
	echo ("ISTART: " . $iStart . "<br>");
	echo ("IEND: " . $iEnd . "<br>");
	echo ("i: " . $i . "<br>");
	echo ("len: " . $iEnd - $iStart . "<br>");
	echo ("parsed: " . $parsed);
	echo ("<hr>");
}


?>