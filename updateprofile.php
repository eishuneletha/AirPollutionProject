<?php
session_start();  
include('Connect.php');

$UserID=$_SESSION['UID'];
$SelectUser="Select * from users where UserID='$UserID'";
$Selrun=mysqli_query($connect,$SelectUser);
$fetch=mysqli_fetch_array($Selrun);

$fname=$fetch['FirstName'];
$lname=$fetch['LastName'];
$uname=$fetch['UserName'];
$email=$fetch['Email'];
$dob=$fetch['DateOfBirth'];
$address=$fetch['Address'];
$postcode=$fetch['PostCode'];

if (isset($_REQUEST['btnupdate'])) 
{
	$first=$_REQUEST['first'];
	$last=$_REQUEST['last'];
	$user=$_REQUEST['uname'];
	$mail=$_REQUEST['email'];	
	$add=$_REQUEST['address'];

	$UserID=$_SESSION['UID'];

	$checkuname="Select * from users where UserName='$user'";
	$checkrun=mysqli_query($connect,$checkuname);

	$unamecount=mysqli_num_rows($checkrun);

	if ($unamecount==0) 
	{
		$update="Update users set 
				FirstName='$first',
				LastName='$last',
				UserName='$user',
				Email='$mail',
				Address='$add'
				Where UserID='$UserID'
				 ";
		$updaterun=mysqli_query($connect,$update);

		if ($updaterun) 
		{
			echo "<script>window.alert('Account updated')</script>";
		}

		else
		{
			echo "<script>window.alert('Something went wrong')</script>";
			echo mysqli_error($connect);
		}
	}

	else
	{
		echo "<script>window.alert('Already exist')</script>";
	}
}


?>
<html>
<head>
	<title>Update Profile</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
 <meta name="viewport" content="width=device-width, intial-scale=1.0">
 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script> 	
</head>
<body class="newyork">
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
                <a href="Campaigns.php">Campaigns</a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
             
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a>
              <a href="MyQuestions.php">My Questions</a>
              <a href="FaqDisplay.php">FAQ</a>
              <a href="viewprofile.php"><span>My Profile</span></a>
           
              <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times-circle"></i>
              </label>
                 
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
	<table align="center" class="table">
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="first" value="<?php echo $fname ?>" class="input"></td>
		</tr>

		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="last" value="<?php echo $lname ?>" class="input"></td>
		</tr>

		<tr>
			<td>User Name:</td>
			<td><input type="text" name="uname" class="input" value="<?php echo $uname ?>"></td>
		</tr>

		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" class="input" value="<?php echo $email ?>"></td>
		</tr>

		<tr>
			<td>Address:</td>
			<td><input type="text" name="address" class="input" value="<?php echo $address ?>"></td>
		</tr>

		<tr>
			<td colspan="2"><input type="submit" name="btnupdate" value="Update" class="button"></td>
		</tr>
	</table>
</form>
</body>
<footer class="jade3">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>