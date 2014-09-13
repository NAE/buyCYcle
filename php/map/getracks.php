<?php
require_once('../db_connect.php');

$sql = "SELECT * FROM Racks ORDER BY rackid";

$sth = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute();
$racks = $sth->fetchAll();

echo json_encode($racks);

?>
