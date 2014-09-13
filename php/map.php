<?php

include 'db_connect.php';

$sql = "SELECT * FROM Racks";

$sth = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute();
$testOutput = $sth->fetchAll();
print_r($testOutput);

?>

