<?php

	require_once('php/db_connect.php');
/**
		
		
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

$qry = $db->prepare("SELECT rackid from BuyCycle.Racks ORDER BY rackid ASC");
$qry->execute();
$allRacks = $qry->fetchAll(PDO::FETCH_BOTH);
$qry = null;

echo "Test data:".json_encode($allRacks);

?>
<html>
		<form id="bikeCheck" action="php/process.php" method="post">
			<table>
			<tr> <td>Station ID: </td>
				<td>
				<select name="station_ID" size="1">
					<?php foreach($allRacks as $pkey => $racks) { 
					
					/* if ($allRacks[i] == $urlSelectedRack ) {
						$selectOption = "selected='" + $allRacks[i] + "' ";
						}
					else { */
						$selectOption = "";
						$currentRack = $allRacks[$pkey]['rackid'];
						?>
						<option value="<?php echo $currentRack ?>"><?php echo $currentRack ?></option>
						
					<?php } ?>
					
				</select>
				</td>
			</tr>
			<tr>			
				<td colspan="2"><input type="submit" class="submitClass" name="action" value="Rent"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="submitClass" name="action" value="Return"></td>
			</tr>
		</form>
</html>
