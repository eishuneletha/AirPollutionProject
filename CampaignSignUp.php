<?php  
session_start();
include('Connect.php');

if (!isset($_SESSION['UID'])) 
{
	echo "<script>window.alert('Login First to Join Campaign!')</script>";
	echo "<script>window.location='UserLogin.php'</script>";
}

$UserID=$_SESSION['UID'];
$Select="Select * from users where UserID='$UserID'";
$selectrun=mysqli_query($connect,$Select);
$fetch=mysqli_fetch_array($selectrun);

$Name=$fetch['UserName'];
$Email=$fetch['Email'];


if (isset($_REQUEST['submit'])) 
{
	$UserID=$_SESSION['UID'];
	$CampaignID=$_REQUEST['sltcampaign'];
	$Date=date('Y-m-d');

	$Insert="Insert into CampaignSignUp values ('$UserID','$CampaignID','$Date')";
	$irun=mysqli_query($connect,$Insert);

	if ($irun) 
	{
		echo "<script>window.alert('Thank you for joining the campaign :3. Now please choose your free kit as a gift from us to joining our campaigns')</script>";
		echo "<script>window.location='Kits.php'</script>";
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
	<title>Campaigns Sign Up</title>
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
		    <th colspan="2">Campaign Sign Up </th>
	</tr>

	<tr>
		<td>Name:</td>
		<td><input type="text" class="input" value="<?php echo $Name ?>" name="txtname" readonly></td>
	</tr>

	<tr>
		<td>Email:</td>
		<td><input type="text" class="input" value="<?php echo $Email ?>" name="txtemail" readonly></td>
	</tr>

	<tr>
		<td>Campaign Title: </td>
		<td>
			<select name="sltcampaign" class="minaj">
				<?php  
					$cquery="Select * from campaigns";
					$crun=mysqli_query($connect,$cquery);
					$crow=mysqli_num_rows($crun);

					for ($i=0; $i <$crow; $i++) 
					{ 
						$cfetch=mysqli_fetch_array($crun);
						$cid=$cfetch['CampaignID'];
						$ctitle=$cfetch['CampaignTitle'];

						echo "<option value='$cid'>$ctitle</option>";
					}



				?>
			</select>
			
		</td>

	</tr>

	<!-- <tr >
		<td colspan='2'><a href="Campaigns.php">Learn More about campaign</a></td>

	</tr> -->

	<tr>
		
		<td colspan="2"><input type="submit" name="submit" value="Confirm Campaign" class="button"></td>
	</tr>


</table>
</form>
</body>

<footer>
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>