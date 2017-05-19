<?php
session_start();
//echo "".$_SESSION['email']."";
if (isset($_SESSION['email']))
{
$var = explode("@",$_SESSION['email'])[0];
echo "".$var."";
}
else
{
	echo "fail";

}
?>