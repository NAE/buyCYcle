<?php
	require_once('./db_connect.php');
	
	$qry = $db->prepare("SELECT slotnum FROM Slots WHERE rackid='".$currentRack."' AND hasbike=1 LIMIT 1;");
	$qry->execute();
	$currentSlot = $qry->fetch(PDO::FETCH_BOTH);
	$qry = null;
	
	if($currentSlot) {
		echo "<br />Please take your bike from stall #".$currentSlot[0].".";
		$update = $db->prepare("UPDATE `Slots` SET `unlock`=1 WHERE `rackid`='".$currentRack."' AND `slotnum`='".$currentSlot[0]."';");
		$update->execute();
		$update = null;
		
	/*	$isTaken = null;
		while ($isTaken == null) {
			$takenQRY = $db->prepare("SELECT slotnum FROM Slots WHERE slotnum='".$currentSlot[0]."' AND hasbike=0 LIMIT 1;");
			$takenQRY->execute();
			$isTaken = takenQRY->fetch(PDO::FETCH_BOTH);
			$takenQRY = null;
			}
			
		echo "Thank you";
	}
	*/
	}
	else {
		echo "<br />There are no bikes available.";
	}
	
/**

Require_Once(DB SELECT PHP);
		If not logged in
			Include log in prompt
			
		Select RENTING from USER_TABLE where USER_ID=$(userid)
			If RENTING = NO,
				Select SLOT from RACK_TABLE where RACK_ID=$(rackid) AND AVAILABLE="YES", LIMIT 1;
				If not null
					Unlock $(rackid) $(slot#)
					Send message to user
						Please take your bike from stall $(slot#)
					//When bike is physically removed
					Update USER_TABLE for $(userid) 
						RENTING = YES
						LAST_CHECKOUT_TIME = current timestamp
						LAST_CHECKOUT_LOC = $(rackid)
					Update RACK_TABLE for $(rackid) $(slot#)
						AVAILABLE="NO"
					
				Else
					Sorry, this rack has no bikes available
				
			If RENTING = YES
				Sorry, you're already renting
				
*/

echo "<br />Rent works";




?>