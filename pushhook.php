<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

echo chdir("/var/www/Bike");
echo shell_exec("sudo cd /var/www/Bike && sudo git pull");

?>
