<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '123456';
$db_name = 'it';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
else
{
//echo "Successful connection";
}
?>
