<?php

	if (!isset($_SESSION['lang']))
		$_SESSION['lang'] = "en";
	else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
		if ($_GET['lang'] == "en")
			$_SESSION['lang'] = "en";
		else if ($_GET['lang'] == "bs")
			$_SESSION['lang'] = "bs";
	}

	require_once "C:/xampp/htdocs/NMC/application/views/public/languages/" . $_SESSION['lang'] . ".php";
?>
