<?php 
	session_start();
	include('Connect.php');



	$UserID=$_SESSION['UID'];

	if (!isset($_SESSION['UID'])) 
		{
			echo "<script>window.alert('You have no permission!Login first')</script>";
			echo "<script>window.location='UserLogin.php'</script>";
		}

	if (isset($_REQUEST['check'])) 
	{
		$password=$_REQUEST['cpass'];
		$HashPassword=md5($password);

		$select="Select * from users where UserID='$UserID' and Password='$HashPassword'";
		$selrun=mysqli_query($connect,$select);
		$selcount=mysqli_num_rows($selrun);

		if ($selcount == 1) 
		{
			echo "<script>window.location='changepassword2.php'</script>";

		}

		else
		{
			echo "<script>window.alert('Your password is incorrect!')</script>";
			echo mysqli_error($connect);
		}
	}

 ?>

<html>
<head>
	<title>Change Password</title>
		<link rel="stylesheet" type="text/css" href="Style.css">
		 <meta name="viewport" content="width=device-width, intial-scale=1.0">
		 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script> 	
</head>
<body class="newyork">
	<div class="page2">
	<div class="head">
   <h1 class="title">Air Pollution</h1>

   <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-bars"></i>
    </label>


          <ul class="menu">
              <a href="Homepage.php"><i class="fas fa-home"></i> Home</a>
               <a href="CityDisplay.php"><i class="fas fa-city"></i> Cities </a> 
                <a href="Homepage2.php">Articles</a>
                <a href="Campaigns.php">Campaigns</a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
      
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a>  
               <a href="MyQuestions.php">My Questions</a>
              <a href="viewprofile.php"><span>My Profile</span></a>
              <a href="FaqDisplay.php">FAQ</a>
              
              <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times-circle"></i>
              </label>
           </ul>
                 
  </div>
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

<div class="profile">
<form action="" method="post">
	<p class="dumpster">
	Please Enter your current password <i class="fas fa-key"></i> <br>
		
	<input type="text" name="cpass">
	<button type="submit" name="check">Confirm</button>
	</p>

</form>
</div>

 

</body>
<div class="page2">
<footer class="jade">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</div>
</html>