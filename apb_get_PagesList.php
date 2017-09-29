
<?php require 'conn.inc'; ?>


<?php

	try {
	//$db = new PDO('sqlite:db/apb.sqlite');
		
    $query = 'SELECT page_id,page_description FROM apb_pages ORDER BY page_id'; 
  	$stmt = $db->prepare( $query );
	$stmt->execute();
	  
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$output = array('pages'=>$result);
	echo json_encode($output);

	}
	catch (PDOException $e) {
		echo "Exception:" + $e->getMessage();
	}


if (isset($_GET['debug']))	
{
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