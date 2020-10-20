<?php
try {
	$db = new PDO('sqlite:../db/apb.sqlite');
} catch (PDOException $e) {
	header('Content-Type: application/json');
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}




function ExecSQL($sql)
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
