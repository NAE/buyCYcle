<?php
require_once('../db_connect.php');

//sql to get all the racks
$sql = "SELECT * FROM Racks ORDER BY rackid";

//sql to get all the slots with bikes for this rack

$sth = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute();
$racks = $sth->fetchAll();

$i = 0;

foreach($racks as $rack){
	$sql2 = "SELECT COUNT(*) FROM Slots WHERE rackid=" . $rack['rackid'] . " AND hasbike=1";
	$sth2 = $db->prepare($sql2);
	$sth2->execute();
	$number_of_rows = $sth2->fetchColumn();
	$rack['numbikes'] = $number_of_rows;
	$racks[$i] = $rack;
	$i++;
}

echo json_encode($racks);

?>
