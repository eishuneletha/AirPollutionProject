<?php  
session_start();
include('Connect.php');

if (!isset($_SESSION['UID'])) 
{
	echo "<script>window.alert('Please login first to claim your free kit :3')</script>";
	echo "<script>window.location='UserLogin.php'</script>";
}

$UserID=$_SESSION['UID'];
$select="Select * from users where UserID='$UserID'";
$selrun=mysqli_query($connect,$select);
$fetch=mysqli_fetch_array($selrun);
$UserName=$fetch['UserName'];


$check="Select * from campaignsignup where UserID='$UserID'";
$checkrun=mysqli_query($connect,$check);
$row=mysqli_num_rows($checkrun);

if ($row==0) 
{
	echo "<script>window.alert('Since you have not join the campaign yet, your free kit is unavaliable. Sign up first!')</script>";
	echo "<script>window.location='CampaignSignUp.php'</script>";
}


$chkit="Select * from kitdetail where UserID='$UserID'";
$chkitrun=mysqli_query($connect,$chkit);
$chkrow=mysqli_num_rows($chkitrun);

if ($chkrow>0) 
{
	echo "<script>window.alert('Sorry..Your free kit is not avaliable since you have got one before!')</script>";
	echo "<script>window.location='Campaigns.php'</script>";
}




if (isset($_REQUEST['order'])) 
{
	$UserID=$_REQUEST['txtuid'];
	$KitID=$_REQUEST['rdokitid'];
	$Address=$_REQUEST['txtadd'];
	$date=date('Y-m-d');

	$insert="Insert into kitdetail values('$UserID','$KitID','$Address','$date')";
	$irun=mysqli_query($connect,$insert);

	if ($irun) 
	{
		echo "<script>window.alert('Order Successful')</script>";
		echo "<script>window.location='Homepage.php'</script>";
	}

	else
	{
		echo "<script>window.alert('Something went wrong')</script>";
		echo mysqli_error($connect);
	}
}

?>

<html>
<head>
	<title>Free Kits</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
</head>
<body class="wall">
	<div class="head">
   <h1 class="title">Air Pollution</h1>

   <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
        <i class="fas fa-bars"></i>
    </label>
          <ul class="menu">
              <a href="Homepage.php"><i class="fas fa-home"></i> Home</a>
               <a href="CityDisplay.php"><i class="fas fa-city"></i> Cities</a> 
               <a href="Homepage2.php">Articles</a>
                <a href="Campaigns.php"><span>Campaigns</span></a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
            
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a>
              <a href="MyQuestions.php">My Questions</a>
              <a href="FaqDisplay.php">FAQ</a>
              <a href="viewprofile.php">My Profile</a>
           
              <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times-circle"></i>
              </label>
           </ul>
                 
  </div>

  <div class="search-box">

    <input class="search-txt" type="text" name="" placeholder="Type to search">
    <a class="search-btn" href="#"> <i class="fas fa-search"></i></a>

  </div>

  <div class="icons">
    <ul>
      <a href="https://www.facebook.com/"><li class="facebook"><i class="fab fa-facebook"></i></li></a>
      <a href="https://www.instagram.com/"><li class="instagram"><i class="fab fa-instagram"></i></li></a>
      <a href="https://twitter.com/"><li class="twitter"><i class="fab fa-twitter"></i></li></a>
      <a href="https://www.redditinc.com/"><li class="reddit"><i class="fab fa-reddit"></i></li></a>
    </ul>
  </div>

	<form action="" method="post" class="form">
		<table class="table">
			<tr>
				<th colspan="2">Free Kit Application</th>
			</tr>
			<tr>
				<td>User Name:</td>
				<td><input type="text" name="uname" value="<?php echo $UserName ?>" readonly class="input"></td>
				<input type="hidden" name="txtuid" value="<?php echo $UserID ?>">
			</tr>

			<tr>
				<td>Free Kit Selection:</td>
				<td align="left">
					<?php 
						$selkit="Select * from kits";
						$selkitrun=mysqli_query($connect,$selkit);
						
						$kitcount=mysqli_num_rows($selkitrun);

						for ($i=0; $i <$kitcount ; $i++) 
						{ 
							$kfe=mysqli_fetch_array($selkitrun);
							$kitid=$kfe['KitID'];
							$kname=$kfe['KitName'];
							$acc=$kfe['Accessories'];
							$des=$kfe['Description'];
							$img=$kfe['KitImage'];

							echo "<input type='radio' name='rdokitid' value='$kitid' >";
							
							
							echo "<img src='$img' width='100' height='80'> ";
							echo "<br>";
							echo "<p class='naomi'style='font-size:15px;width:160px;line-height:1.5rem;'>Name: $kname</p>";
							// echo "<br>";

							echo "<p class='naomi'>Accessories: $acc</p>";
							echo "<br>";
						}
					 ?>


				</td>
			</tr>

			<tr>
				<td>Delivery Address:</td>
				<td><textarea name="txtadd" class="ta"></textarea></td>
			</tr>


			<tr>
				<td colspan="2"><input type="submit" value="Confirm Order" name="order" class="button"></td>
			</tr>
		</table>
	</form>
</body>

<footer>
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>