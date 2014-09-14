<?php
	require_once('./db_connect.php');
			
		$currentRack = $_POST['currentRack'];
		$currentSlot = $_POST['currentSlot'];
		
		//Lock the bike back in
		$update = $db->prepare("UPDATE `Slots` SET `unlock`=0 WHERE `rackid`='".$currentRack."' AND `slotnum`='".$currentSlot."';");
		$update->execute();
		$update = null;
		
		//Calculate rental time
		$rental = $db->prepare("SELECT `lastrented`, `curbalance` FROM `Users` WHERE `userid`='846881035' LIMIT 1;");
		$rental->execute();
		
		$current = $rental->fetch(PDO::FETCH_BOTH);
		$rental = null;
		$checkIn = new DateTime();
		$checkOut = new DateTime($current['lastrented']);
		$difference = $checkIn->diff($checkOut);
		$echo $difference;
		$charge = $difference * -.25;
		$balance = $charge + $current['curbalance'];
		
		//update the current balance
		$updateBalance = $db->prepare("UPDATE `Users` SET `curbalance`='".$balance."' WHERE `userid`=`846881035`;");
		
		

?>