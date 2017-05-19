<?php
$con=mysqli_connect("localhost","root","","softwareeng");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$email='';
$category='';
$description='';
// escape variables for security
if (isset($_POST['email']))
{
$email = $_POST['email'];
}

if (isset($_POST['category']))
{
$category =$_POST['category'];
}

if (isset($_POST['description']))
{
$description = $_POST['description'];
}

$textToStore = nl2br(htmlentities($description, ENT_QUOTES, 'UTF-8'));

//$requirement_id=rand();


$sql="INSERT INTO requirement_post (cust_eid,category,description)
	VALUES ('$email','$category','$textToStore')";


if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));

	}
	else
	{
		echo "Succesfully inserted";
		header("refresh:2;url=index.html");

	}
mysqli_close($con);







?>