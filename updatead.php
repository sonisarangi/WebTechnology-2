<?php
session_start();
@mysql_connect("localhost", "root", "");
mysql_select_db ("softwareeng");
$email = $_SESSION["email"];
$sql = "SELECT * FROM materials WHERE email_id = '$email'";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($query);
?>

<!DOCTYPE html >
<html  xml:lang="en" lang="en">
    <head><script></script>
        <title>UPDATE ad</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!--link rel="stylesheet" type="text/css" href="css/dealpost.css"/-->
    </head>
    <body>    
        <form action="update.php" enctype="multipart/form-data" class="register" method='POST'>
            <h1>UPDATE ADVERTISEMENT</h1>
            <fieldset class="row1">
                <legend>contact Details
                </legend>
                <p>
                    <label>Email *
                    </label>
                    <input type="email" name="email" value = "<?php echo $row['email_id']; ?>" readonly/>
                    <label>Phone *
                    </label>
                    <input type="tel" name="phone" maxlength="10" value = "<?php echo $row['phone']; ?>" autofocus/>
                </p>
                <p>
                    <label class="obinfo">* obligatory fields
                    </label>
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Material Details
                </legend>
                <p>
                    <label>Name *
                    </label>
                    <input type="text" name="mat_name" class="long" value = "<?php echo $row['material_name']; ?>"/>
                </p>
		<p><label>Image *
                    </label><br>
					<?php 
						$content = "Content-type:" . $row['image_type'];
						echo '<img src="data:'.$content.';base64,'.base64_encode( $row['image'] ).'" height = "500" width = "1000"/>';
					?>
					<br>
  	          Change Picture: <input type="file" name="userImage" id="userImage" class="long" accept="image/*"/>
  </p>
                <p>
                    <label>cost*
                    </label>
                    <input type="text" name="cost" value = "<?php echo $row['cost']; ?>"/>
                   </p>
                <p>
                    <label class="optional">Description
                    </label>
                    <input type="text" name="desc" class="long" value = "<?php echo $row['description']; ?>"/>
                </p>
                <p>
                    <label>City *
                    </label>
                    <input type="text" name="city" class="long" value = "<?php echo $row['city']; ?>"/>
                </p>
                <p>
                    <label>Category *
                    </label>
                    <select name="category">
                        <option value="1"  >foundation
                        </option>
                        <option value="2" >interiors
                        </option>
                    </select>
                </p>
                <p>
                    <label class="optional">link to dealers Website
                    </label>
                    <input class="long"  name="link" type="text" value = "<?php echo $row['link']; ?>"/>

                </p>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
                <p>
                    <label>gender *</label>
                    <label class="gender">Male</label><input type="radio" name="gender" value="Male" <?php if($row['gender'] == "Male"){echo 'checked';}?>>
				    <label class="gender">Female</label><input type="radio" name="gender" value="Female" <?php if($row['gender'] == "Female"){echo 'checked';}?>>
				    <label class="gender">others</label><input type="radio" name="gender" value="Other" <?php if($row['gender'] == "Other"){echo 'checked';}?>>
                 </p>


          
         <p>
                    <label>Address *
                    </label>
                    <input type="text" name="address" class="long" value = ""/>
                </p>
                
                <div class="infobox"><h4>Helpful Information</h4>
                    <p>1.If your item is not present on <b>BuildMyHome</b>, you may enter any category from the list closest to your item category.<br>
2.<b>BuildMyHome</b> is a free service and does not charge you any fees to post Ads. Go ahead and enjoy it. All Ads are subject to meeting the Terms of Use and Prohibited Items Policy.<br>
3.You can post up to 25 different Ads daily. Any duplicate ads or the same ad posted more than once will be deleted.
</p>
                </div>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>*  I accept the <a href="terms.html" onclick="foo()"target="_blank">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I want to receive personalized offers by your site</label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>Allow costumers to contact me on phone no.</label>
                </p>
            </fieldset>
            <div><button class="button" >Register &raquo;</button></div>
        </form>
    </body>
</html>