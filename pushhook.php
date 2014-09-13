<?php

echo chdir("/var/www/Bike");
echo shell_exec("git pull");

?>
