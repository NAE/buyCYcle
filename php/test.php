<?php
	require_once('./db_connect.php');
		
		//Calculate rental time
		$rentalQry = $db->prepare("SELECT lastrented FROM Users WHERE userid='846881035';");
		$rentalQry->execute();
		$lastRented = $rentalQry->fetch(PDO::FETCH_BOTH);
		$rentalQry = null;
		
		$balanceQry = $db->prepare("SELECT `curbalance` FROM `Users` WHERE `userid`='846881035';");
		$balanceQry->execute();
		$initialBalance = $balanceQry->fetch(PDO::FETCH_BOTH);
		$balanceQry = null;
		
		$checkIn = time();
		echo $checkIn;
		$checkOut = $lastRented[0];
		echo "<br />".$checkOut;
		
		$difference = $checkIn - $checkOut;
		echo "<br />".$difference;
		
		$charge = $difference * -.01;
		
		$charge = number_format($charge,2);
		
		$newBalance = $initialBalance[0] + $charge;
		echo "<br />".$charge;
		echo "<br />".$newBalance;
		$newBalance = number_format($newBalance,2);
		
		// //update the current balance
		$updateBalance = $db->prepare("UPDATE `Users` SET `curbalance`='".$newBalance."' WHERE `userid`='846881035';");
		$updateBalance->execute();
		$updateBalance = null;
		
?>

<html>
Hi
</html>