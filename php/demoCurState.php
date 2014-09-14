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
		<div style='margin-top: 120px;'></div>
		<center>
		<div style='background-image: url("../Graphics/greenLines.png"); width: 1300px; height: 340px; padding-top: 20px; radius: 5px; background-repeat: no-repeat;'>
		<center>
		<table>
			<tr id="numrow">
				<?php
				for($i = 1; $i <= 10; $i++) {
					echo "<td><center><div class='numbers' style='font-size: 24px;'>".$i."</div></center></td>";
				}
				?>
			</tr>
				<?php
					$qry = $db->prepare("SELECT * FROM Slots WHERE rackid='12B'");
					$qry->execute();
					$all = $qry->fetchAll(PDO::FETCH_BOTH);
					$qry = null;
			echo "<tr id='bikerow'>";
			echo "</tr>
			<tr id='lockopen'>";
					foreach($all as $pkey) {
						$cur = $pkey['unlock'];
						if($cur == 1) {
							echo "<td><img class='imgSize' src='../Graphics/lockOpen.png'></td>";
						}
						else {
							echo "<td><img class='imgSize' src='../Graphics/lockClosed.png'></td>";
						}
					}
				?>
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
		console.log(data);
		$("#bikerow").html("");
		$("#lockrow").html("");
		for (var bike in data){
			console.log(bike);
			var slotNum = bike['slotnum'];
			var rackId = bike['rackid'];
			var hasBike = bike['hasbike'];
			var unlock = bike['unlock'];
			
			var tdString;
			if(hasBike == "1"){
				tdString = "<td><img class='imgSize' src='../Graphics/greenBike.png'></td>";
			}else{
				tdString = "<td><img class='imgSize' src='../Graphics/redBike.png'></td>";
			}
			
			$(tdString).appendTo("#bikerow");
		}
	});
	setTimeout("updateContents();", 1000);
}

updateContents();

</script>

</html>
