<?php
	//$db is the var name of the connected database
	require_once('db_connect.php');
?>
<html>
	
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
		<center><div class="shadow"><h1 style="color:black; line-height: 75px;"><center id="racklabel">12B</center></h1></div></center>
		<center>
		<div style='background-color: white; width: 1300px; height: 425px; padding-top: 25px; border-radius-bottom-left: 5px; border-radius-bottom-right: 5px;'>
		<center>
		<table style="box-shadow: 0px 0px 15px 5px rgba(0, 0, 0, .35);">
			<tr id="numrow">
				<?php
					for($i = 1; $i <= 10; $i++) {
						echo "<td><center><div class='numbers imgSize' style='font-size: 50px; background-color: #f5f5f5;'>".$i."</div></center></td>";
					}
				?>
			</tr>
			<tr id='bikerow'>
			</tr>
			<tr id='lockrow'>
			</tr>
		</table>
		</center>
		</div>
	</center>
</body>
<script type="text/javascript">
	
var rack = "12B";

<?php

	if (isset($_GET['rack'])){
		echo "rack = '" . $_GET['rack'] . "';\n";
		echo "$('#racklabel').html(rack);";
	}

?>

function updateContents(){
	$.post("getCurState.php", {rack: rack}, function(data){
		data = $.parseJSON(data);
		$("#bikerow").html("");
		$("#lockrow").html("");
		for (var bike in data){
			var bikeData = data[bike];
			var slotNum = bikeData['slotnum'];
			var rackId = bikeData['rackid'];
			var hasBike = bikeData['hasbike'];
			var unlock = bikeData['unlock'];
			
			var bikeTdString;
			if(hasBike == "1"){
				bikeTdString = "<td><img class='imgSize bike bike-take' data-slot='" + slotNum + "' data-rack='" + rackId + "' src='../Graphics/greenBike.png?test=1'></td>";
			}else{
				bikeTdString = "<td><img class='imgSize bike bike-return' data-slot='" + slotNum + "' data-rack='" + rackId + "' src='../Graphics/redBike.png?test=1'></td>";
			}
			$(bikeTdString).appendTo("#bikerow");
			
			var lockTdString;
			if(unlock == "1"){
				lockTdString = "<td><img class='imgSize' src='../Graphics/lockOpen.png'></td>";
			}else{
				lockTdString = "<td><img class='imgSize' src='../Graphics/lockClosed.png'></td>";
			}
			$(lockTdString).appendTo("#lockrow");
		}
		
		$(".bike-take").click(function(){
			takeBike($(this).attr("data-rack"), $(this).attr("data-slot"));
		});
		$(".bike-return").click(function(){
			returnBike($(this).attr("data-rack"), $(this).attr("data-slot"));
		});
	});
	setTimeout("updateContents();", 1000);
}

function takeBike(rack, slot){
	$.post("takeBike.php", {rack: rack, slot: slot}, function(data){
		console.log(data);
	});
}

function returnBike(rack, slot){
	$.post("returnBike.php", {rack: rack, slot: slot}, function(data){
		console.log(data);
	});
}

updateContents();

</script>

</html>
