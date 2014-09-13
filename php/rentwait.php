<?php
		$currentSlot = $_POST['currentSlot'];
		$currentRack = $_POST['currentRack'];
		
		$ready == "no";
		while ($ready == "no") {

			if(!$isTaken) {
				$takenQRY = $db->prepare("SELECT slotnum FROM Slots WHERE rackid='".$currentRack."' AND slotnum='".$currentSlot."' AND hasbike=0 LIMIT 1;");
				$takenQRY->execute();
				
				$isTaken = $takenQRY->fetch(PDO::FETCH_BOTH);
				
				$takenQRY = null;
			}
			else {
				$ready = "yes";
			}
		}
		
?>