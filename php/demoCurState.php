<?php
	//$db is the var name of the connected database
	include("db_connect");
?>
<html>

<head>

</head>

<body style="background-color: #004125;">
		<table>
			<tr>
				<?php
				for($i = 0; $i < 12; $i++) {
					echo "<td>".$i."</td>";
				}
				?>
			</tr>
		</table>
		
</body>

</html>