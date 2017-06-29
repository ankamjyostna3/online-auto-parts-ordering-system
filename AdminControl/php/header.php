<?php
ini_set('display_errors', 'On');
include "ManageChargeData.php";
session_start();

$logText = "";

function trace($text) {
	global $logText;
	$logText .= $text . '<br>';
}

if (!isset($_SESSION['controller'])) {
	$_SESSION['controller'] = new ManageChargeData;
	trace("new controller created and put in session");
}

?>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Sample PHP implementation of Manage Charge Data use case.">

    <title>Use Case &ndash; Extra Charges Details &ndash; Pure</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/side-menu.css">
    <!--<![endif]--> 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>


