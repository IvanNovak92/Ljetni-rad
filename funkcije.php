<?php

function provjeraLogin() {
	if (!isset($_SESSION["logiran"])) {
		header("location: " . $GLOBALS["putanjaAPP"] . "index.php?nemateOvlasti");
		exit ;
	}
}

function provjeraUloga($uloga){
	if( !(isset($_SESSION["logiran"]) && $_SESSION["logiran"]->uloga===$uloga)){
		header("location: " . $GLOBALS["putanjaAPP"] . "privatno/roba/pindex.php");
		exit ;
	}
}