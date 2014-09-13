<?php

/*
Open of DB connection
*/

//$db=mysql_connect("localhost", "root", "ageoldjim") or die(mysql_error());

$dsn = 'mysql:host=localhost;dbname=BuyCycle';
$un = 'root';
$pw = 'ageoldjim';




try {
    $db = new pdo($dsn,$un,$pw);
}catch (PDOException $e) {
    echo "Failed to connect to the database: (" . $e->getMessage() . "\n";
}


?>
