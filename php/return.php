<?php
/*
		Require_Once(DB SELECT PHP);
		If not logged in
			Include log in prompt
			
		If RENTING = YES,
				Select SLOT from RACK_TABLE where RACK_ID=$(rackid) AND AVAILABLE="NO", LIMIT 1;
				If not null
					Send message to user
						Please return your bike to stall $(slot#)
					//when bike is physically returned
					Update USER_TABLE for $(userid)
						RENTING = NO
						LAST_CHECKIN_TIME = current timestamp
						LAST_CHECKOUT_LOC = $(rackid)
					Update RACK_TABLE for $(rackid) $(slot#)
						AVAILABLE="YES"
					Select LAST_CHECKIN_TIME, LAST_CHECKOUT_TIME, EMAIL, LAST_CHECKOUT_LOC, LAST_CHECKIN_LOC from USER_TABLE where USER_ID = $(userid)
						Send to receipt.php
						
				Else
					Sorry, this rack has no bikes available. Please return it to another station.
				
			If RENTING = YES
				Sorry, you're already renting
*/


?>