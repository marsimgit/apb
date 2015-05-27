
<?php require 'conn.inc'; ?>
<?php include 'pagefunc.inc'?>
<?php include 'release.inc'; ?>

<?php 
	error_reporting (E_ALL ^ E_NOTICE);

	/*
	if (!isset($_POST['action']))
	{
		//If not isset -> set with dumy value
		$_POST['action'] = "undefine";
	}
	*/
	
	$page_class = $_POST["page_class"];
	$page_id = $_POST["page_id"];
	$page_body = $_POST["page_body"];
	$action = $_POST["action"];
	$confirm = $_POST["confirm"];
	$base_flag = $_POST["base_flag"];
	$confirm = $_POST["doadd"];
	$commit = $_POST["commit"];
	$delete_flag = $_POST["delete_flag"];
?>

<?php if ($action=="") {
	echo('<head>');
	echo('<title>Another Page Builder');
	echo('</title>');
	echo ("<link href='css/grid3.css' media='screen' rel='stylesheet' type='text/css' />");
	echo ("<link href='css/marsim.css' media='screen' rel='stylesheet' type='text/css' />");
	echo('</head>');

	echo('<html>');
	
	
	
	echo ("<div class='container container_3'>");
		echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
			echo ("Another Page Builder - $apb_release");
		echo ("</div>");
	
		echo ("<div class='grid_3'>");
			echo ("<img src='images/apb_logo.png' width='8%' height='8%' border='0' alt='logo'>");
		echo ("</div>");
		
		echo ("<div id='navigation' class='grid_3' style='background-color: #174E68'>");
		echo ("&nbsp;");	
		echo ("</div>");
	
	echo('<form method=POST ACTION=apb.php>');
		
		echo ("<div class='grid_1'>");
			echo("Select Page:");
			WebSelectList("SELECT page_id FROM apb_pages ORDER BY page_id","page_id");
		echo ("</div>");
			
		echo ("<div class='grid_2'>");
			echo('<input type=radio name=action value=apb_add>Add a new page (<input type=CHECKBOX NAME=base_flag> based on the selected page).<br>');
			echo('<input type=radio name=action value=apb_edit>Edit the selected page.<br>');
			echo('<input type=radio name=action value=apb_delete>Delete the selected page.<br>');
			echo('<input type=radio name=action value=apb_view>View the selected page with these parameters: <input type=input SIZE=50 NAME=parameters>');
			echo('<input type=submit value="Process">');
		echo ("</div>");
			
	echo('</form>');

	echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
		echo ("&nbsp;");
	echo ("</div>");
	
		echo ("<div class='grid_2'>");	
			echo('<H2>Page Index:</H2>');				
			WebTable("SELECT page_id as 'PAGE ID',page_description as 'PAGE DESCRIPTION',LENGTH(page_body) as 'PAGE SIZE' FROM apb_pages");				
		echo("</div>");

		echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
		echo ("&nbsp;");
		echo ("</div>");
		
		
	echo ("</div>");		

	
	echo("</body>");
	echo("</html>");
}
else {
  switch ($action)
  {
     case 'apb_add':
     	if ($base_flag=='on') {
     		echo('<head>');
     		echo('<title>Another Page Builder');
     		echo('</title>');
     		echo ("<link href='css/grid3.css' media='screen' rel='stylesheet' type='text/css' />");
     		echo ("<link href='css/marsim.css' media='screen' rel='stylesheet' type='text/css' />");
     		echo('</head>');
     		
     		echo('<html>');
     		echo ("<div class='container container_3'>");    		
     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo ("Another Page Builder - $apb_release");
     			echo ("</div>");

     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo ("Add a new page based on " . $page_id . " in the apb_pages table");
     			echo ("</div>");

     			echo('<form method=POST action=apb_add.php>');
     			
     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo('Page Name: ');
     				echo('<br>');
     				echo('<input type=text NAME=page_id size=50>');
     			echo ("</div>");

     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo('Page Description: ');
     				echo('<br>');
     				Webinput("SELECT page_description FROM apb_pages WHERE page_id='" . $page_id . "'", "page_description");
     			echo ("</div>");

     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo('Page Contents:<br>');
     				WebTextArea("SELECT page_body FROM apb_pages WHERE page_id='" . $page_id . "'","page_body");
     			echo ("</div>");
     				
     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo("<input type=submit value='Add Page'>");
     			echo ("</div>");
     				
     			echo('</form>');
     			
     			
     		echo ("</div>");

     		echo('</body>');
	 		echo('</html>');
     	}    	
     	else {     
     		echo('<head>');
     		echo('<title>Another Page Builder');
     		echo('</title>');
     		echo ("<link href='css/grid3.css' media='screen' rel='stylesheet' type='text/css' />");
     		echo ("<link href='css/marsim.css' media='screen' rel='stylesheet' type='text/css' />");
     		echo('</head>');
     		     		
     		echo('<html>');
     		echo ("<div class='container container_3'>");

     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo ("Another Page Builder - $apb_release");
     			echo ("</div>");     		

     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo ("Add a new page");     				     			
     			echo ("</div>");    			
     			
     			echo('<form method=POST action=apb_add.php>');
     			
     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo('Page Name: <br> <input type=input NAME=page_id size=70>');
     			echo ("</div>");
     			
     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
	     			echo('Page Description: <br> <input type=input NAME=page_description size=70>');
     			echo ("</div>");

     			echo ("<div class='grid_3' style='color: #D0D0D0; font-size: smaller; background-color: #174E68'>");
     				echo('Page Contents:');
     				echo('<TEXTAREA NAME=page_body ROWS=20 COLS=70></TEXTAREA>');
     				echo("<input type=submit value='Insert Page'>");
     			echo ("</div>");
     			
     			echo('</form>');
     			
     		echo ("</div>");

	 		echo('</body>');
	 		echo('</html>');
     	}
	break;
     
     case "apb_edit":
     	if ($page_id=="") {
	  		ERR_NoAction();
     	}
     	else {
     		apb_page_head();
     		
     		echo ("<div class='grid_3'>");
     			echo("Edit the page " . $page_id . " in the apb_pages> table");
     		echo ("</div>");
     			
	 		echo('<FORM METHOD=POST ACTION=apb_update.php>');
	 		
	 		echo ("<div class='grid_3'>");
	 			echo("Page Name: <br>");
         		echo("<input type=text readonly name=page_id value='" . $page_id . "'>"); 
         	echo ("</div>");

         	echo ("<div class='grid_3'>");
	 			echo('Page Description: <br>');
	 			Webinput ("SELECT page_description FROM apb_pages WHERE page_id='" . $page_id . "'","page_description");
	 		echo ("</div>");
	 		
	 		echo ("<div class='grid_3'>");
	 			echo("Page Contents");
	 			WebTextArea ("SELECT page_body FROM apb_pages WHERE page_id='" . $page_id . "'","page_body");
	 		echo ("</div>");
	 			
	 		echo ("<div class='grid_3'>");
	 			echo("<input type=submit value='Update Page'>");
	 		echo ("<div class='grid_3'");
	 		
	 		echo('</form>');

	 		apb_page_foot();
     	}
     break;
     
     case "apb_delete":
     	if (s_pageid=="") {
	  		ERR_NoAction();
     	}
     	else {
     		
     		apb_page_head();
     		
	  		echo('<FORM METHOD=POST ACTION=apb_delete.php>');
	  		echo ("<div class='grid_3'>");
	  			echo('Page Name: <br>');
	  			echo("<input type=text readonly name=page_id value='" . $page_id . "'>");
	  		echo ("</div>");
	  		
	  		echo ("<div class='grid_3'>");
	  			echo("WARNING - THE PAGE WILL BE DELETED");
  			echo ("</div>");
	  		
	  		echo ("<div class='grid_3'>");
	  			echo("<input type=submit value='Delete'>");
	  			echo ("</div>");
	  			
	  		echo('</form>');
	  		
	  		apb_page_foot();
     	}
		break;
	
    case "apb_view":
    	header("Location: apb_view.php?page_id="."$page_id");
    	break;
     	  
    case "apb_debug":
     	echo('<html>');
	echo('<head>');
	echo('<title>ASP APB Debug Page</title>');
	echo('</head>');
	echo('<body>');
	echo('<hr>');
	
	echo('<STRONG>s_pageclass </STRONG>" & s_pageclass & "<br>');
	echo('<STRONG>s_pageid </STRONG>" & s_pageid & "<br>');
	echo('<STRONG>s_action </STRONG>" & s_action & "<br>');
	echo('<STRONG>s_confirm</STRONG>" & s_confirm & "<br>');
	echo('<STRONG>s_base_flag</STRONG>" & s_base_flag & "<br>');
	
	echo('<hr>');
	echo('</body>');
	echo('</html>');
	break;
	      
    default:
     	apb_page_head();
		echo('<h1 align=center>Errore:</H1>');
		echo('<h1 align=center>Comando non riconosciuto</H1>');
		apb_page_foot();
		break;
  }
}
