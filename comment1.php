
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Star rating widget example</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
    
    <p>
    <form action="comment.php" method="post">
    Name:<input type="textarea" name="name" required><br>
    Comment:<input type="textarea" name="comment" required><br>
      Rating:
      <span class="starRating">
        <input id="rating5" type="radio" name="rating" value="5">
        <label for="rating5">5</label>
        <input id="rating4" type="radio" name="rating" value="4">
        <label for="rating4">4</label>
        <input id="rating3" type="radio" name="rating" value="3" checked>
        <label for="rating3">3</label>
        <input id="rating2" type="radio" name="rating" value="2">
        <label for="rating2">2</label>
        <input id="rating1" type="radio" name="rating" value="1">
        <label for="rating1">1</label>
      </span>
      <input type="submit" value="comment">
      </form>
    </p>
  </body>
  <?php
  session_start();
$_SESSION['dealer']=$_GET['dealer'];
$dealer=$_SESSION['dealer'];
echo "<b>Comments</b>";
$con=mysqli_connect("localhost","root","","softwareeng");
// Check connection
    if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      else{

            $sql ="SELECT * FROM review where dealer='$dealer'"; 
            $retval = mysqli_query( $con, $sql);
            if(! $retval )
            {
              die('Could not get data: ' . mysql_error());
            }
             $sql1 ="SELECT AVG(rating) FROM review where dealer='$dealer'"; 
            $retval1 = mysqli_query( $con, $sql1);
            while($row1 = mysqli_fetch_array($retval1,MYSQL_ASSOC)) 
            {  echo"<br>";
                echo "<p style='font-size:20px;'>Average rating: ";
                echo $row1['AVG(rating)'] ;  
            } 

            while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
            {
                echo "<p style='font-size:20px;'>".$row["comment"];echo "";
                echo "<p style='font-size:10px;'><i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp By- ".$row['name'];
                echo"</i>";
            }
             
           
        }     
 ?>
</html>

