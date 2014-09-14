<?php
	require_once('./db_connect.php');
			
		$currentRack = $_POST['currentRack'];
		$currentSlot = $_POST['currentSlot'];
		
		//Lock the bike back in
		$update = $db->prepare("UPDATE `Slots` SET `unlock`=0 WHERE `rackid`='".$currentRack."' AND `slotnum`='".$currentSlot."';");
		$update->execute();
		$update = null;
		
	
		
		

?>