<?php
session_start();
$dealer=$_SESSION['dealer'];
echo $dealer;
$con=mysql_connect("localhost", "root", "") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db("softwareeng",$con) or die("Failed to connect to MySQL: " . mysql_error());  
$cursor = mysql_query("INSERT INTO review values('$dealer','$_POST[name]', '$_POST[comment]', '$_POST[rating]')");

if ($cursor) {
    echo "New record created successfully";
} else {
    echo "Error: " . "<br>" . mysql_error();

}
header("location:lol3.php");
?>
