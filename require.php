<html>
<head>
<title>Interior Design | Catalogue</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<script src="js/jquery-1.6.2.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jcarousellite_1.0.1.js"></script>
<script src="js/jquery.galleriffic.js"></script>
<script src="js/jquery.opacityrollover.js"></script>
<script>
$(document).ready(function () {
    $(".jCarouselLite").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
        speed: 400,
        vertical: false,
        circular: true,
        easing: 'easeOutQuart',
        visible: 4,
        start: 0,
        scroll: 1
    });
});
</script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->

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
<script>
function init()
{
	$.get("check.php", function(data){
		//alert(data);
        if(data != "fail")
        {
        	//window.location = "customer_signin.html";
        
        	//alert(data);
        	//window.location = "postad.html";
        	sign = document.getElementById("sign");
        	sign.innerHTML = "<a >Welcome "+data+"</a>";
        	/*ul = document.getElementById("ul");
        	li = document.creatElement("li");
        	li.setAttribute("class","active");
        	li.innerHTML = data;
        	ul.appendChild(li);*/
        }
        }
    );
}
</script>
</head>
<body id="page3" onload = "init()">
<!--==============================header=================================-->
<header>
  <div class="row-1">
    <div class="main">
      <div class="container_12">
        <div class="grid_12">
          <nav>
            <ul class="menu">
              <li><a href="index.html">Home</a></li>
              
              <li><a class="active" href="catalogue.html">Catalogue</a></li>
              
              <li><a href="contacts.html">Contacts</a></li>
              <li id="sign"></li>
			  <li ><a href = "signout.php">LogOut</a></li></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="row-2">
    <div class="main">
      <div class="container_12">
        <div class="grid_9">
          <h1> <a class="logo" href="index.html">Int<strong>e</strong>rior</a> <span>Design</span> </h1>
        </div>
        <div class="grid_3">
          <form id="search-form" action="#" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="search-field">
                <input name="search" type="text">
                <a class="search-button" href="#"><span>search</span></a> </div>
            </fieldset>
          </form>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</header>

<section id="content">
    	<div class="bg-top-2">
    	<div class="bg-top-shadow">	
    	<div class="gallery p3">
    	<div class="wrapper indent-bot">
                  <div >
                  <?php
$con=mysqli_connect("localhost","root","","softwareeng");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
extract($_GET);
$sql = 'select c.name, m.email_id, m.image from materials as m, requirement_post as r, customer as c where r.cust_eid != m.email_id and r.category = m.category  and m.email_id != "'.$email.'" group by m.email_id';
//echo "$email";  
//$sql = 'select * from requirement_post where cust_eid="'.$email.'"';
$retval1 = mysqli_query( $con, $sql);

if(! ($retval1))
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysqli_fetch_array($retval1,MYSQL_ASSOC))
{
  //print_r ($row["name"]);



?>



<span class="image">
<?php
//$r= $row["image"];

?>


<?php 
//$var = $row["material_name"];
?>

<a href = 'lol2.php?email=<?php echo "".$row["email_id"].""; ?>&name=<?php echo"".$row["name"]."";?>'><img src="data:image/jpeg;base64,<?php echo base64_encode( $row["image"]); ?>" width="150" style="max-height:250px; min-height: 250px;height:auto;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;" border="0" /><br clear="all" /></a>
<?php 
echo "<br>";
echo "<b>Name of the Dealer::<b>";
echo $row["name"];echo "<br>";


?>
</span>
<?php
}
?>
</div>
   </div></div>    </div> </div>
</section>

<footer>
  <div class="main">
    <div class="container_12">
      <div class="wrapper">
        <div class="grid_4">
          <div>Copyright &copy; <a href="#">Domain Name</a> All Rights Reserved</div>
          <div>Design by <a target="_blank" href="http://www.google.com/">BuildMyHOME</a></div>
          <!-- {%FOOTER_LINK} -->
        </div>
        <div class="grid_4"> <span class="phone-numb"><span>+1(800)</span> 123-1234</span> </div>
        <div class="grid_4">
          <ul class="list-services">
            <li><a href="#"></a></li>
            <li><a class="item-2" href="#"></a></li>
            <li><a class="item-3" href="#"></a></li>
            <li><a class="item-4" href="#"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
