<?php
	//$db is the var name of the connected database
	require_once('db_connect.php');
?>
<html>
	
<head>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
		<div style='margin-top: 120px;'></div>
		<center>
		<div style='background-image: url("../Graphics/greenLines.png"); width: 1300px; height: 340px; padding-top: 20px; radius: 5px; background-repeat: no-repeat;'>
		<center>
		<table>
			<tr>
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
			echo "<tr>";
					foreach($all as $pkey) {
						$cur = $pkey['hasbike'];
						if($cur == 1) {
							echo "<td><img class='imgSize' src='../Graphics/greenBike.png'></td>";
						}
						else {
							echo "<td><img class='imgSize' src='../Graphics/redBike.png'></td>";
						}
					}
			echo "</tr>
			<tr>";
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
	$.post("getCurState.php", {rack: "12B", function(data){
		console.log(data);
	});
	setTimeout("updateContents();", 1000);
}

updateContents();

</script>

</html>
