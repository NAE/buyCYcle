<?php
	require_once('./db_connect.php');
	
	$qry = $db->prepare("SELECT `slotnum` FROM `Slots` WHERE `rackid`='".$currentRack."' AND `hasbike`=0 AND `unlock`=0 LIMIT 1;");
	$qry->execute();
	$currentSlot = $qry->fetch(PDO::FETCH_BOTH);
	$qry = null;
	if($currentSlot) {
		echo "<center><div style='font-size: 24px;'>Please return your bike to stall #".$currentSlot[0].".</div></center>";
		include('./returnunlock.php');
		
	}
	else {
		echo "<br /><center><div style='font-size: 24px;'>There are no empty slots available.</div></center>";
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



?>


<html>

<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<script type="text/javascript">

	function checkLoop() {
		checkForReturn();
		
		global = setTimeout("checkLoop()", 500);
		

	}
	
	function checkForReturn() {
		
		$.post("./returnwait.php",{currentRack : "<?php echo $currentRack ?>", currentSlot : "<?php echo $currentSlot[0] ?>"}, function(data){
			console.log(data);
			
			if (data) {
			
				$("#bikelabel").removeClass("label-danger").addClass("label-success").html("Thank you!");
				clearTimeout(global);
					
					$.post("./returnlock.php",{currentRack : "<?php echo $currentRack ?>", currentSlot : "<?php echo $currentSlot[0] ?>"}, function(info) {
					});
					
					window.location = "http://buy-cycle.me/Bike/thanks.html";
			
			}
		});
		
	}

	checkLoop();
</script>

</head>
<body>
	<br><center><span id="bikelabel" class="label label-danger">Please return bike!</span></center>
</body>

</html>
