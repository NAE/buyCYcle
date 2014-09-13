<?php
	require_once('./db_connect.php');
			
		$update = $db->prepare("UPDATE `Slots` SET `unlock`=1 WHERE `rackid`='".$currentRack."' AND `slotnum`='".$currentSlot[0]."';");
		$update->execute();
		$update = null;

?>