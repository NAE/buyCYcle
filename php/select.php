<?php
	//If logged in, generate page
		//include select.html
?>

<html>

	<head>
	
	<head>
	
	<body>
	
		<form id="bikeCheck" action="form.php" method="get">
			<table>
			<tr> <td>Station ID: </td>
				<td>
				<select name="station_ID" size="1">
					<option value="12A">12A</option>
					<option value="14B">14B</option>
				</select>
				</td>
			</tr>
			<tr>			
				<td colspan="2"><input type="submit" class="submitClass" name="rent" value="Rent"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="submitClass" name="return" value="Return"></td>
			</tr>
		</form>
	
	</body>
	
	
</html>

<?php
	//endif logged in
?>