<?php
		while ($ready == "no") {

			if(!$isTaken) {
				$takenQRY = $db->prepare("SELECT slotnum FROM Slots WHERE slotnum='".$currentSlot[0]."' AND hasbike=0 LIMIT 1;");
				$takenQRY->execute();
				
				$isTaken = $takenQRY->fetch(PDO::FETCH_BOTH);
				
				$takenQRY = null;
			}
			else {
				$ready = "yes";
			}
		}
		
?>