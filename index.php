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

//$count = $db->query("SELECT count(*) from Slots 



?>
<html>
<head>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
		<form id="bikeCheck" action="php/process.php" method="post">
		<script type="text/javascript">
		
		function getCurrSelect(selection) {
			var currSelect = selection.value;
			
			$.post("./php/map/getracks.php", {}, function(data){
				data = $.parseJSON(data);
				for(var rack in data) {
					var rackData = data[rack];
				
			
			}
			});
			
			//$('#bikesAvail').html("Test");
			
		}
		
		
		
		/*
		
			for(var rack in data){
			var rackData = data[rack];
			var lat = rackData.lat;
			var lon = rackData.lon;
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(lat, lon),
				map: map,
				icon: "../img/bikerack.png"
			});
		*/
		</script>
			<table id="rackTable">
			<tr> <td>Station ID: </td>
				<td>
				<select name="station_ID" size="1" id="stationSelect">
				
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
				<script type="text/javascript">
		
					$('#stationSelect').change(function() {
						alert($(this).val());
					}
					
					);
				</script>
				</td>
			</tr>
			<tr>
				<td>Bikes available:</td> <td id="bikesAvail"></td>
			</tr>
						<tr>
				<td>Open slots:</td> <td id="openSlots"></td>
			</tr>
			<tr>			
				<td colspan="2"><input type="submit" class="submitClass" name="action" value="Rent"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="submitClass" name="action" value="Return"></td>
			</tr>
		</form>
</html>
