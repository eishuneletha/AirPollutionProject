<?php  
session_start();

include('Connect.php');

if (isset($_REQUEST['login'])) 
{
	$uname=$_REQUEST['txtusername'];
	$password=$_REQUEST['txtpassword'];
	$hashpassword=md5($password);
	$check="Select * from users where UserName='$uname' and Password='$hashpassword'" ;
	$checkrun=mysqli_query($connect,$check);
	$checkcount=mysqli_num_rows($checkrun);

	$userfetch=mysqli_fetch_array($checkrun);


	if ($checkcount==1) 
	{
		echo "<script>window.alert('Login Successful')</script>";
		$_SESSION['UID']=$userfetch['UserID'];
		echo "<script>window.location='viewprofile.php'</script>";
	}

	else
	{

		if (isset($_SESSION['errorcount'])) 
		{
			
			 $logincount=$_SESSION['errorcount'];

			if ($logincount==1)
			{
				$_SESSION['errorcount']=2;
				echo "<script>window.alert('Login Fail 2nd time')</script>";
				echo "<script>window.location='LoginTimer.php'</script>";

				
			}

			if ($logincount==2) 
			{
					
					// echo "<script>window.alert('Login Fail. Your're locked for 10 minutes')</script>";
				echo "<script>window.alert('Login Fail.You are locked for 10 minutes')</script>";
				echo "<script>window.location='LoginTimer.php'</script>";
			}

		}

		else
		{
			$_SESSION['errorcount']=1;
			echo "<script>window.alert('Login Fail First time')</script>";
		echo mysqli_error($connect);
		}
	
	}

}

?>

<html>
<head>
	<title>Login</title>
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
              <a href="CityDisplay.php"><i class="fas fa-city"></i> Cities </a> 
               <a href="Homepage2.php">Articles</a>
                <a href="Campaigns.php">Campaigns</a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <span><i class="fas fa-sign-in-alt"></i> Login</span></a>       
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
    <a class="search-btn" href="#">  <i class="fas fa-search"></i> </a>

  </div>



  <div class="icons">
    <ul>
      <a href="https://www.facebook.com/"><li class="facebook"><i class="fab fa-facebook"></i></li></a>
      <a href="https://www.instagram.com/"><li class="instagram"><i class="fab fa-instagram"></i></li></a>
      <a href="https://twitter.com/"><li class="twitter"><i class="fab fa-twitter"></i></li></a>
      <a href="https://www.redditinc.com/"><li class="reddit"><i class="fab fa-reddit"></i></li></a>
    </ul>
  </div>





<form  action="" method="post" class="form">
	<table class="table">
		 <tr>
		    <th colspan="2">Login Here</th>
		  </tr>

		<tr>
			<td>UserName <i class="fas fa-user"> :</td>
			<td><input class="input" type="text" name="txtusername"></td>
		</tr>

		<tr>
			<td>Password  <i class="fas fa-key"> :</td>
			<td><input class="input" type="password" name="txtpassword"></td>
		</tr>

		<tr>
		    <td colspan="2"><button type="submit" name="login" value="Login" class="button">Login</td>
		  </tr>

		  <tr>
		    <td colspan="2"><p>New to here?Register now!</p></td>
		    
		  </tr>

		  <tr>
		     <td colspan="2"><a href="UserRegister.php"><button class="button">Register</a></td>
		  </tr>

		<tr>
		  	  <td colspan="2"><p>You want to log out?</p></td>
		  </tr>

		  <tr>
		  	<td colspan="2"><a href="AdminLogout.php"><input type="button" class="button" value="Logout Now"></a></td>
		  </tr>
	</table>
</form>



</body>


  <footer  class="jade3">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>