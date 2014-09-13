<?php

		echo "<br />Please take your bike from stall #".$currentSlot[0].".";
		$update = $db->prepare("UPDATE `Slots` SET `unlock`=1 WHERE `rackid`='".$currentRack."' AND `slotnum`='".$currentSlot[0]."';");
		$update->execute();
		$update = null;

?>