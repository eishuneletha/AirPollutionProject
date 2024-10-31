<?php 
	session_start();
	include('Connect.php');

	if (isset($_REQUEST['login'])) 
	{
		$uname=$_REQUEST['txtusername'];
		$password=$_REQUEST['txtpassword'];

		$aselect="Select * from admin where UserName='$uname' and Password='$password'";
		$aselectrun=mysqli_query($connect,$aselect); //run

		$acount=mysqli_num_rows($aselectrun);
		$afetch=mysqli_fetch_array($aselectrun); //fetch

		if ($acount>0) 
		{
			echo "<script>window.alert('Login Successful')</script>";

			$_SESSION['AID']=$afetch['AdminID'];

		}

		else
		{
			echo "<script>window.alert('Something went wrong')</script>";
		}


	}


 ?>



<html>
<head>
	<title>Admin Login</title>
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
            <!--   <a href="#"><i class="fas fa-home"></i> Home</a> -->
              <a href="AdminRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="AdminLogin.php"><span> <i class="fas fa-sign-in-alt"></i> Login</span></a>
             <!--  <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
               <a href="Posts.php">Posts</a>
             <a href="Faq.php">Faqpage</a> 
             <a href="QuestionDisplay.php">Asked Questions</a>
             <a href="cityentry.php">City Entry</a>
             <a href="CampaignEntry.php">CampaignEntry</a>
             <a href="KitEntry.php">KitEntry</a>
             <a href="KitList.php">KitList</a>
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





<form  action="" method="post" class="form">
	<table class="table">
		 <tr>
		    <th colspan="2">Admin Login </th>
		  </tr>

		<tr>
			<td>User Name: <i class="fas fa-user"> :</td>
			<td><input class="input" type="text" name="txtusername"></td>
		</tr>

		<tr>
			<td>Password: <i class="fas fa-key"> :</td>
			<td><input class="input" type="password" name="txtpassword"></td>
		</tr>

		<tr>
		    <td colspan="2"><button type="submit" name="login" value="Login" class="button">Login</td>
		  </tr>

		  <tr>
		    <td colspan="2"><p align="center">Are you a new admin?Register now!</p></td>
		    
		  </tr>

		  <tr>
		     <td colspan="2"><a href="AdminRegister.php"><button class="button">Register</a></td>
		  </tr>

		  <tr>
		  	<td colspan="2">You wanna log out?</td>
		  </tr>

		  <tr>
		  	<td colspan="2"><a href="Logout.php"><input type="button" value="Logout" class="button"></a></td>
		  </tr>
	</table>
</form>



</body>


  <footer>
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>