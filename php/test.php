<?php
	require_once('./db_connect.php');
		
		//Calculate rental time
		$rentalQry = $db->prepare("SELECT lastrented FROM Users WHERE userid='846881035';");
		$rentalQry->execute();
		$lastRented = $rentalQry->fetch(PDO::FETCH_BOTH);
		$rentalQry = null;
		
	//	$balanceQry  $db->prepare("SELECT `curbalance` FROM `Users` WHERE `userid`='846881035';");
	//	$balanceQry->execute();
	//	$initialBalance = $balanceQry->fetch(PDO::FETCH_BOTH);
		
		
	//	$checkIn = date("Y-m-d H:i:s");
	//	$echo $checkIn;
		
		
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