<?php
$con = mysqli_connect("localhost", "root", "", "softwareeng");
//mysql_select_db ("softwareeng");
extract($_FILES);
$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);


//echo $imgData;
//echo $imageProperties;
$email=$_POST['email'];
//echo $email; 

$phone=$_POST['phone'];
$mat_name=$_POST['mat_name'];
$cost=$_POST['cost'];
$desc=$_POST['desc'];
$city=$_POST['city'];
$category=$_POST['category']; 
$link=$_POST['link'];
$gender=$_POST['gender'];
$address=$_POST['address'];
echo $imageProperties['mime'];
$sql = "INSERT INTO materials(email_id,phone,material_name,image,image_type,date_upload,cost,description,city,category,link,gender)
VALUES('$email','$phone','$mat_name','$imgData','{$imageProperties['mime']}',NOW(),'$cost','$desc','$city','$category','$link','$gender')";
$current_id = mysqli_query($con,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());

header('Location:index.html');
?>

