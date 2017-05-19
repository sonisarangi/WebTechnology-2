<?php

//header("Location : index.html");
$con=mysqli_connect("localhost","root","","softwareeng");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$email='';
$password='';

// escape variables for security
if (isset($_POST['email']))
{
$email = $_POST['email'];
}

if (isset($_POST['paswd']))
{
$password =$_POST['paswd'];
}
$cursor="SELECT * FROM customer where email = '$email'";
$result=mysqli_query($con,$cursor);
if (!$result)
{
	die('Error: ' . mysqli_error($con));
}
else
{
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
if ($row['password'] == $_POST['paswd'])
{
session_start();
$_SESSION['email'] = $_POST["email"];
//echo "".$_SESSION['email']."";

echo '<br><br><br><br><br><br><br><br><center><h2><i>'.$_SESSION['email'].'<br><br>'."You have successfully logged in".'<br><br></i></h2>';
echo '<br> <A HREF="index.html"> <input type="submit" name="ABC" value="NEXT" style="border-radius:40" size="30"/></A></center>';
}
else
{
echo '<center><br><br><br><br><br><br><br><br><br><br>';
echo '<h2>'."Invalid password or username!!!".'<br>';
echo "Try again".'</h2>';
echo '<form action="index.html" method="post">';
echo '<input type="submit" value="Back" />';
echo '</form>';
}
}
header("Location:index.html");
die();
?> 