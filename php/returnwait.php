<?php
		require_once('./db_connect.php');
		
		$currentSlot = $_POST['currentSlot'];
		$currentRack = $_POST['currentRack'];
		
		$takenQRY = $db->prepare("SELECT slotnum FROM Slots WHERE rackid='".$currentRack."' AND slotnum='".$currentSlot."' AND hasbike=1 LIMIT 1;");
		$takenQRY->execute();
		
		$isTaken = $takenQRY->fetch(PDO::FETCH_BOTH);
		
		$takenQRY = null;

		echo $isTaken;
?>