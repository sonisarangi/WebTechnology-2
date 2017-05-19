<?php
$con=@mysql_connect("localhost", "root", "") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db("softwareeng",$con) or die("Failed to connect to MySQL: " . mysql_error());  
$cursor = mysql_query("SELECT * FROM dealer where email = '$_POST[email]'");
$row=mysql_fetch_array($cursor);
if ($row['password'] == $_POST['paswd'])
{
session_start();
$_SESSION['email'] = $_POST["email"];
echo '<br><br><br><br><br><br><br><br><center><h2><i>'.$_SESSION['email'].'<br><br>'."You have successfully logged in".'<br><br></i></h2>';
echo '<br> <A HREF="postad.html"> <input type="submit" name="ABC" value="NEXT" style="border-radius:40" size="30"/></A><br><br>';
echo '<br> <A HREF="updatead.php"> <input type="submit" name="ABC" value="UPDATE" style="border-radius:40" size="30"/></A></center>';

}
else
{
echo '<center><br><br><br><br><br><br><br><br><br><br>';
echo '<h2>'."Invalid password or username!!!".'<br>';
echo "Try again".'</h2>';
echo '<form action="home.html" method="post">';
echo '<input type="submit" value="Back" />';
echo '</form>';
}
?> 