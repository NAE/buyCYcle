<?php
	require_once('./db_connect.php');
			
		$currentRack = $_POST['currentRack'];
		$currentSlot = $_POST['currentSlot'];
		
		//Lock the bike back in
		$update = $db->prepare("UPDATE `Slots` SET `unlock`=0 WHERE `rackid`='".$currentRack."' AND `slotnum`='".$currentSlot."';");
		$update->execute();
		$update = null;
		
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
		
		exec('echo "You owe $' . $charge . ' for your recent Buy-Cycle ride." | mail -s "Your recent Buy-Cycle ride" 5158651636@vmobl.com');
		
		$newBalance = $initialBalance[0] + $charge;
		echo "<br />".$charge;
		echo "<br />".$newBalance;
		$newBalance = number_format($newBalance,2);
		
		// //update the current balance
		$updateBalance = $db->prepare("UPDATE `Users` SET `curbalance`='".$newBalance."' WHERE `userid`='846881035';");
		$updateBalance->execute();
		$updateBalance = null;

?>
