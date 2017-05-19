<?php
mysql_connect("localhost", "root", "");
mysql_select_db ("softwareeng");
extract($_FILES);
$email=$_POST['email'];
//echo $email; 
//echo $_POST["userImage"];
$phone=$_POST['phone'];
$mat_name=$_POST['mat_name'];
$cost=$_POST['cost'];
$desc=$_POST['desc'];
$city=$_POST['city'];
$category=$_POST['category']; 
$link=$_POST['link'];
$gender=$_POST['gender'];
$address=$_POST['address'];

if($_FILES['userImage']['name'] == "")
{
$sql = "UPDATE materials SET phone='$phone', material_name='$mat_name',cost='$cost',description='$desc',city='$city',category='$category',link='$link',gender='$gender' where email_id='$email'";
$current_id = mysql_query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());
}

else
{
$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
$sql = "UPDATE materials SET phone='$phone',material_name='$mat_name',image='$imgData',image_type='{$imageProperties['mime']}',date_upload=NOW(),cost='$cost',description='$desc',city='$city',category='$category',link='$link',gender='$gender' where email_id='$email'";
$current_id = mysql_query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error());
}

header('Location:updatead.php');
?>