<?php
require_once('../db_connect.php');

//sql to get all the racks
$sql = "SELECT * FROM Racks ORDER BY rackid";

//sql to get all the slots with bikes for this rack
$sql2 = "SELECT * FROM Slots WHERE rackid=" . $rackid . " AND hasbike=1";

$sth = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute();
$racks = $sth->fetchAll();

foreach($racks as $rack){
	print_r($rack);
	$sth2 = $db->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth2->execute();
	$slots = $sth2->fetchAll();
	$rack['numbikes'] = count($slots);
}

echo json_encode($racks);

?>
