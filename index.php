<?php

	require_once('php/db_connect.php');
	
	if(isset($_GET['rack'])) {
		$urlSelectRack = $_GET['rack'];
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
	<div class="well container">
		<div class="row">
			<form class="form-horizontal span6" id="bikeCheck" action="php/process.php" method="post" role="form">
				<div class="form-group">
					<label for="stationSelect">Station ID:</label>
					<select class="form-control" name="station_ID" size="1" id="stationSelect">
					
						<?php foreach($allRacks as $pkey => $racks) {  
							$currentRack = $allRacks[$pkey]['rackid'];
							
							if(!$urlSelectRack) { ?>
								<option value="<?php echo $currentRack ?>"><?php echo $currentRack ?></option>
							<?php
								}
							else {
														
								if ($currentRack == $urlSelectRack ) { ?>
									<option value="<?php echo $currentRack ?>" selected><?php echo $currentRack ?></option>
							<?php
								}
								else { 
							?>
								<option value="<?php echo $currentRack ?>"><?php echo $currentRack ?></option>
							<?php }
							
							}
						}//end foreach ?> 
						
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
				</div>
				<div class="input-group">
					<input type="text" class="form-control" value="Bikes available:" disabled />
					<span class="input-group-addon" id="bikesAvail"></span>
				</div>
				<div class="input-group">
					<input type="text" class="form-control" value="Open slots:" disabled />
					<span class="input-group-addon" id="openSlots"></span>
				</div>
				<tr>			
					<td colspan="2"><input type="submit" class="btn btn-success submitClass" name="action" value="Rent"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" class="btn btn-success submitClass" name="action" value="Return"></td>
				</tr>
			</form>
		</div>
	</div>
</html>
