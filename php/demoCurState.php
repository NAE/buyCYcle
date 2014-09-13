<?php
	//$db is the var name of the connected database
	require_once('db_connect.php');
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
				for($i = 1; $i <= 10; $i++) {
					echo "<td class='numbers'>".$i."</td>";
				}
				?>
			</tr>
		
		<?php
			$qry = $db->prepare("SELECT * FROM BuyCycle.Slots WHERE rackid = '12B' ORDER BY slotnum ASC");
			$qry->execute();
			$all = $qry->fetchAll(PDO::FETCH_BOTH);
			$qry = null;

			foreach($all as $pkey => $value) {
				$cur = $all[$pkey]['hasbike'];
				echo $cur;
			}
		?>
		</table>
	</center>
</body>

</html>