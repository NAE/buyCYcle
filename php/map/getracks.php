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
	$qry = $db->prepare("SELECT * FROM Slots WHERE rackid='".$rack['rackid']."' AND hasbike=1;");
	$qry->execute();
	$rack['numbikes'] = $qry->rowCount();
	
	$qry = $db->prepare("SELECT * FROM Slots WHERE rackid='".$rack['rackid']."' AND hasbike=0;");
	$qry->execute();
	$rack['emptyslots'] = $qry->rowCount();
	$racks[$i] = $rack;
	$i++;
}

echo json_encode($racks);

?>
