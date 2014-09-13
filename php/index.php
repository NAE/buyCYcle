<?php
/*		Require_Once(DB SELECT PHP);
		
		If $_POST data from bookmark/tiny URL
			Select relevant rack ID
				$urlSelectedRack
				
				
		Select from Rack table list of all racks
			Use array to generate options in drop-down, $_allRacks
				
		If not logged in
			Hide/disable submit buttons
				
			include Log in prompt
			
		If logged in
			Show/enable submit buttons
			
			Generate HTML for form
				foreach statement to generate 
					if ($allRacks[i] == $urlSelectedRack ) {
						$selectOption = "selected='" + $allRacks[i] + "' ";
						}
					else {
						$selectOption = "";
						}
					<?php echo "<option name='"+ $_allRacks[i] + "' " + $selectOption + "value='" + $allRacks[i] + "' >"; ?>
					
					//Label ideas:
						//Bikes available
						//Select count from RACK_TABLE where RACK_ID = $allRacks[i] and AVAILABLE="YES"
						//If null, $availableBikes = 0
						
						//Return slots available
						//Select count from RACK_TABLE where RACK_ID = $allRacks[i] and AVAILABLE="NO"
						//If null, $openSlots = 0
						
			
			2 submit buttons
				Rent
				Return
				
		If not logged in
			include login.html
			
*/


?>