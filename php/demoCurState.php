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
		<div style='margin-top: 50px;'></div>
		<center><h3 style="color: white;">Abstraction of Rack with Bikes & Locks</h3></center>
		<center>
		<div style='background-color: white; width: 1300px; height: 400px; border-radius: 5px;'>
		<center>
		<table>
			<tr id="numrow">
				<?php
					for($i = 1; $i <= 10; $i++) {
						echo "<td><center><div class='numbers imgSize' style='font-size: 24px;'>".$i."</div></center></td>";
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


function updateContents(){
	$.post("getCurState.php", {rack: "12B"}, function(data){
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
				bikeTdString = "<td><img class='imgSize' src='../Graphics/greenBike.png'></td>";
			}else{
				bikeTdString = "<td><img class='imgSize' src='../Graphics/redBike.png'></td>";
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
	});
	setTimeout("updateContents();", 1000);
}

updateContents();

</script>

</html>
