
<?php
	require_once('./db_connect.php');
		
	if (isset($_POST['action'])) {
		$action = strtolower($_POST['action']);
		
	}	
	elseif (isset($_GET['action'])) {
		$action = strtolower($_GET['action']);
		
	}
	else {
		$action = 'blank';
	}
		
	if (isset($_POST['station_ID'])) {
		$currentRack = $_POST['station_ID'];
		echo "<br />".$currentRack;
		
		}	
	elseif (isset($_GET['station_ID'])) {
		$currentRack = $_GET['station_ID'];
		
	}
	else {
		$currentRack = '';
	}
	
	include($action.'.php');
	

?>
<html>
<head>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
</html>