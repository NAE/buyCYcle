<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo chdir("/var/www/Bike");
echo shell_exec("git pull");

?>
