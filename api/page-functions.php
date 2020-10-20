<?php

require 'data-layer.php';

function apb_page_head() {
	echo('<head>');
	echo('<title>Another Page Builder');
	echo('</title>');
	echo ("<link href='css/grid3.css' media='screen' rel='stylesheet' type='text/css' />");
	echo ("<link href='css/marsim.css' media='screen' rel='stylesheet' type='text/css' />");
	echo('</head>');
	echo('<html>');
	echo('<body>');
	echo ("<div class='container container_3'>");
		echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
			echo ("Another Page Builder - $apb_release");
		echo ("</div>");
	
}

function apb_page_foot() {
	echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
	echo ("&nbsp;");
	echo ("</div>");
	echo('</div>');
	echo('</body>');
	echo('</html>');
}

function WebTextArea($sql, $id)
{
	$row = $db->query($sql)->fetch();

	echo ("<TEXTAREA NAME=" . $id . " ROWS=20 COLS=80 >");
	echo ($row[0]);
	echo ("</TEXTAREA>");
}


function WebInput($sql, $id)
{

	$row = $db->query($sql)->fetch();

	echo ("<INPUT TYPE=input NAME=" . $id . " size=50 value='" . $row[0] . "'>");
}


function WebSelectList($sql, $id)
{
	$result = $db->query($sql);

	echo ("<select name='" . $id . "' SIZE=10>");
	foreach ($result as $row) {
		echo ("<option> " . $row['page_id']);
	}
	echo ("</select>");
}


function WebTable($sql)
{
	$result = $db->query($sql);

	echo ("<table>");
	echo ("<tr>");
	for ($i = 0; $i < $result->columnCount(); $i++) {
		$meta = $result->getColumnMeta($i);
		$column[] = $meta['name'];

		echo ("<th>"	. $column[$i] .  "</th>");
	}
	echo ("<tr>");

	foreach ($result as $row) {
		echo ("<TR>");
		for ($i = 0; $i < $result->columnCount(); $i++) {
			echo ("<TD> " . $row[$i] . " </TD>");
		}
		echo ("</TR>");
	}

	echo ("</table>");
}


function WebSelectCombo($sql, $id)
{
	$result = $db->query($sql);

	echo ("<SELECT NAME=" & id & ">");
	foreach ($result as $row) {
		echo ("<option>" .  $row[0] . "</option>");
	}
	echo ("</SELECT>");
}


?>