<?php 
try 
{
	$db = new PDO('sqlite:db/apb.sqlite');

}
catch ( PDOException $e )
{
	die( $e->getMessage() );
}

function WebTextArea($sql,$id)
{
	$db = new PDO('sqlite:db/apb.db3');
	$row=$db->query($sql)->fetch();
	
	echo ("<TEXTAREA NAME=" . $id . " ROWS=20 COLS=80 >");
	echo ($row[0]);
	echo ("</TEXTAREA>");

}


function WebInput($sql,$id)
{
	$db = new PDO('sqlite:db/apb.db3');
	$row=$db->query($sql)->fetch();

	echo ("<INPUT TYPE=input NAME=" . $id . " size=50 value='" . $row[0] . "'>"); 
}
	

function WebSelectList($sql,$id)
{
	$db = new PDO('sqlite:db/apb.db3');
	$result=$db->query($sql);
	
	echo("<select name='" . $id . "' SIZE=10>");
		foreach($result as $row)
		{
			echo ("<option> " . $row['page_id']);
		}
	echo("</select>");
}

 
function WebTable($sql)
{
	$db = new PDO('sqlite:db/apb.db3');
	$result=$db->query($sql);
	
	echo ("<table>");
	echo("<tr>");
	for($i=0;$i<$result->columnCount();$i++)
	{
		$meta = $result->getColumnMeta($i);
		$column[] = $meta['name'];

			echo("<th>"	. $column[$i] .  "</th>");
	}
	echo("<tr>");
	
	foreach($result as $row)
	{	
 		echo ("<TR>");
 		for($i=0;$i<$result->columnCount();$i++)
 		{
 			echo ("<TD> " . $row[$i] . " </TD>");
		}
  		echo ("</TR>");
	}
 
	echo ("</table>");
}


function WebSelectCombo($sql,$id)
{
	$db = new PDO('sqlite:db/apb.db3');
	$result=$db->query($sql);
	
	echo ("<SELECT NAME=" & id & ">");	
	foreach($result as $row)
	{
		echo ("<option>" .  $row[0] . "</option>");
	}
	echo ("</SELECT>");
}


function ExecSQL ($sql)
{
	//rs.Open sql
}


function ERR_NoAction()
{
	apb_page_head();
	echo ("<h1 align=center>Errore:</H1>");
	echo ("<h1 align=center>Pagina da elaborare non specificata</H1>");
	apb_page_foot();
}

?>