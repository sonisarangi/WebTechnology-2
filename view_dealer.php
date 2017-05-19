<html>
<style>
.image
{
margin:10px;
float:left;
border-style: solid;
border-width: 1px;
}
img{
width: 300px;
height: 300px;
}
</style>
<?php
$con=mysqli_connect("localhost","root","","softwareeng");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql ="SELECT * FROM materials"; 
$sql1 ="SELECT * FROM requirement_post";
$retval = mysqli_query( $con, $sql);
$retval1 = mysqli_query( $con, $sql1);
if(! ($retval && $retval1 ))
{
  die('Could not get data: ' . mysql_error());
}
?>


<?php
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC)) {
?>
<span class="image">
<?php
$r= $row["image"];

?>




<img src="data:image/jpeg;base64,<?php echo base64_encode( $r); ?>" width="190" style="min-height:100px; height:auto;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;" border="0" /><br clear="all" />
<?php 
echo "<br>";
echo "Material Name::";
echo $row["material_name"];echo "<br>";
echo "Price::";
echo $row["cost"];echo "<br>";
echo "description::";
echo $row["description"];echo "<br>";
echo "Email::";
echo $row["email_id"];echo "<br>";
echo "Phone Number::";
echo $row["phone"];echo "<br>";
echo "gender::";
echo $row["gender"];echo "<br>";

//echo $row["image_type"];echo "<br>";
echo "Uploaded on::";
echo $row["date_upload"];echo "<br>";

echo "Place::";
echo $row["city"];echo "<br>";
echo "category::";
echo $row["category"];echo "<br>";
echo "link::";
echo $row["link"];echo "<br>";
echo "<a href='comment1.php?dealer=".$row['email_id']."'>Comments</a>"; 

?>
</span>
<?php
} ?>

</html>
