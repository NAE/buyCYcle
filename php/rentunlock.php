<?php
	require_once('./db_connect.php');
		//Unlock the rack
		$update = $db->prepare("UPDATE `Slots` SET `unlock`=1 WHERE `rackid`='".$currentRack."' AND `slotnum`='".$currentSlot[0]."';");
		$update->execute();
		$update = null;
		
		//Update user's timestamp
		$now = time();
		$update = $db->prepare("UPDATE `Users` SET `lastrented`='".$now."' WHERE `userid`='846881035';");
		$update->execute();
		$update = null;
		
?>