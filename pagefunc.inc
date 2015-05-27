<?php

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

?>