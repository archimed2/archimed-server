<?php
error_reporting(0);
$con = mysql_connect('mysql.serverplads.net', 'u883350326_optim','Mickey2011');


if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("u883350326_optim", $con);
?>