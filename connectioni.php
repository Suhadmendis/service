<?php
$GLOBALS['hostname'] = 'localhost';
$GLOBALS['username'] = 'admin';
$GLOBALS['password'] = '123';
$GLOBALS['db'] = 'services';
 
$GLOBALS['dbinv'] = mysqli_connect($GLOBALS['hostname'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db']);
 
?>
