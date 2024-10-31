<?php 
include('Connect.php');

if (isset($_REQUEST['enter'])) 
{
	$name=$_REQUEST['aname'];
	$uname=$_REQUEST['uname'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];

	$insert="Insert into admin(AdminName,UserName,Email,Password) values ('$name','$uname','$email','$password')";
	$irun=mysqli_query($connect,$insert);

	if ($irun) 
	{
		echo "<script>window.alert('Register Successful')</script>";
	}

	else
	{
		echo "<script>window.alert('Something went wrong')</script>";
	}
}

 ?>

 <html>
<head>
	<title>AdminRegister</title>
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
             <!--  <a href="#"><i class="fas fa-home"></i> Home</a> -->
              <a href="AdminRegister.php"><span><i class="fas fa-cash-register"></i> Register</span></a>
              <a href="AdminLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
              <!-- <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
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



<form method="post" action="" class="form" >
<table class="table">
  <tr>
    <th colspan="2">Register Here</th>
  </tr>


<tr>
  <td>Admin Name <i class="fas fa-user"></i> :</td>
   <td><input class="input" type="text" name="aname" placeholder="Enter Admin Name Here" ></td>
</tr>
 
 <tr>
  <td>User Name <i class="fas fa-user"></i> :</td>
   <td><input class="input" type="text" name="uname" placeholder="Enter User Name Here" ></td>
</tr>
  

  <tr>
    <td>Email <i class="fas fa-envelope"></i> :</td>
    <td><input class="input" type="text" name="email"></td>
  </tr>

  <br>

  <tr>
    <td>Password <i class="fas fa-key"></i> :</td>
    <td><input class="input" type="password" name="password"></td>
  </tr>

  
  <tr>
    <td colspan="2"><button type="submit" name="enter" value="Register" class="button">Register</td>
  </tr>

  <tr>
    <td colspan="2"><p align="center">Not a user?Login as Admin here</p></td>
    
  </tr>

  <tr>
     <td colspan="2"><a href="AdminLogin.php"><button class="button">Login</a></td>
  </tr>
 
 </table>
      </form> 



</body>


  <footer>
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>