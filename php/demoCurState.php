<?php
	//$db is the var name of the connected database
	require_once('db_connect.php');
?>
<html>
	
<head>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
	<center>
		<table style='margin-top: 120px;'>
			<tr>
				<?php
				for($i = 1; $i <= 10; $i++) {
					echo "<td class='numbers'><center>".$i."</center></td>";
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
</body>

</html>