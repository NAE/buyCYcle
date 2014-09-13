<?php
	//$db is the var name of the connected database
	include("db_connect");
?>
<html>
	
<head>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body style="background-color: #004125;">
	<center>
		<table>
			<tr>
				<?php
				for($i = 1; $i <= 12; $i++) {
					echo "<td class='numbers'>".$i."</td>";
				}
				?>
			</tr>
		</table>
	</center>
		<?php
			$qry = $db->prepare("SELECT * FROM BuyCycle.Slots WHERE rackid = '12B' ORDER BY slotnum ASC");
			$qry->execute();
			$all = $qry->fetchAll(PDO::FETCH_BOTH);
			$qry = null;

			foreach($all as $pkey) {
				$cur = "";

			}
		?>
</body>

</html>