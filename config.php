<?php

$dbcon = mysqli_connect("localhost", "root", "", "userform");
if(!$dbcon) echo "Database error".mysqli_error($dbcon);

?>