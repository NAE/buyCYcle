<?php
	//$db is the var name of the connected database
	require_once('db_connect.php');
?>
<html>
	
<head>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body background: #b4e391; /* Old browsers */
background: -moz-linear-gradient(top, #b4e391 0%, #61c419 50%, #b4e391 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b4e391), color-stop(50%,#61c419), color-stop(100%,#b4e391)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%); /* IE10+ */
background: linear-gradient(to bottom, #b4e391 0%,#61c419 50%,#b4e391 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 ); /* IE6-9 */
copy
>
	<center>
		<table>
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