<?php
	require_once('./db_connect.php');
		
		//Calculate rental time
		$rental = $db->prepare("SELECT `lastrented`, `curbalance` FROM `Users` WHERE `userid`='846881035' LIMIT 1;");
		$rental->execute();
		$current = $rental->fetch(PDO::FETCH_BOTH);
		$rental = null;
		
		
		$checkIn = date("Y-m-d H:i:s");
		$echo $checkIn;
		
		$checkOut = $current['lastrented'];
		// $difference = $checkIn->diff($checkOut);
		// $echo $difference;
		// $charge = $difference * -.25;
		// $balance = $charge + $current['curbalance'];
		
		// //update the current balance
		// $updateBalance = $db->prepare("UPDATE `Users` SET `curbalance`='".$balance."' WHERE `userid`=`846881035`;");
		
		

?>

<html>
Hi
</html>