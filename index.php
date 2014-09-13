<?php

	require_once('php/db_connect.php');
	
	if(isset($_GET['rack'])) {
		$urlSelectRack = $_GET['rack']; 
		echo $urlSelectRack;
	}


$qry = $db->prepare("SELECT rackid from BuyCycle.Racks ORDER BY rackid ASC");
$qry->execute();
$allRacks = $qry->fetchAll(PDO::FETCH_BOTH);
$qry = null;

?>
<html>
<head>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="./css/main.css">

<script type="text/javascript">
		
					$(document).ready(
						function() {
							$.post("./php/map/getracks.php", {}, function(data){
								data = $.parseJSON(data);
								for(var rack in data) {
									var rackData = data[rack];
									console.log(data);
									if ($('#stationSelect').val() == rackData['rackid']) {
										$('#bikesAvail').html(rackData['numbikes']);
										$('#openSlots').html(rackData['emptyslots']);
									}
								}
							});
						}
					);
				</script>
</head>
		<form id="bikeCheck" action="php/process.php" method="post">

			<table id="rackTable">
			<tr> <td>Station ID: </td>
				<td>
				<select name="station_ID" size="1" id="stationSelect">
				
					<?php foreach($allRacks as $pkey => $racks) {  
					$currentRack = $allRacks[$pkey]['rackid'];
					echo $currentRack;
					if($urlSelectRack) {
						if ($currentRack == $urlSelectRack ) {
							$selectOption = "selected='" + $currentRack + "' ";
						}
					}
					else { 
						$selectOption = "";
					}
					
					?>
						
						<option value="<?php echo $currentRack ?>" <?php echo $selectOption ?> ><?php echo $currentRack ?></option>
						
					<?php }//end foreach ?> 
					
				</select>
				<script type="text/javascript">
		
					$('#stationSelect').change(
						function() {
							$.post("./php/map/getracks.php", {}, function(data){
								data = $.parseJSON(data);
								for(var rack in data) {
									var rackData = data[rack];
									console.log(data);
									if ($('#stationSelect').val() == rackData['rackid']) {
										$('#bikesAvail').html(rackData['numbikes']);
										$('#openSlots').html(rackData['emptyslots']);
									}
								}
							});
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
