<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

echo print_r(chdir("/var/www/Bike"));
echo shell_exec("git pull");

?>
