
<?php require 'conn.inc'; ?>
<?php require 'apb_parse.inc'; ?>

<?php
	$db = new PDO('sqlite:../db/apb.sqlite');
	$sql = "SELECT page_body FROM apb_pages WHERE page_id ='" . $_GET["page_id"] . "'";
	$row=$db->query($sql)->fetch();
	

	$str_PageBody=$row["page_body"];
	
	$ext=0;
	while ($ext<>1)
	{
		$iStart = strripos($str_PageBody,"<apb>");
		$iEnd = strripos($str_PageBody,"</apb>");
		 
		if ($iStart==0 && $iEnd==0) 
		{
			echo ($str_PageBody);
			$ext=1;
		}
		else
		{
			//echo (mid(str_PageBody,1,iStart-1));
			//str_APB_Command=trim((mid(str_PageBody,iStart + 5,iEnd-iStart-5)))
			//parse (str_APB_Command)
			//str_PageBody= mid(str_PageBody,iEnd + 6)
		}
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