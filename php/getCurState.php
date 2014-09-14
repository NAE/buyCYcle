<?php
require_once('db_connect.php');

$rack = $_POST['rack'];

$qry = $db->prepare("SELECT * FROM Slots WHERE rackid='" . $rack . "'");
$qry->execute();
$all = $qry->fetchAll(PDO::FETCH_BOTH);
$qry = null;

echo json_encode($all);
?>
