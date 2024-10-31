<?php 
session_start();
include('Connect.php');

if (!isset($_SESSION['UID'])) 
{
  echo "<script>window.alert('You have no permission!Login first')</script>";
  echo "<script>window.location='UserLogin.php'</script>";
}

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

 ?>
 <html>
 <head>
 	<title>View Profile</title>
 	<link rel="stylesheet" type="text/css" href="Style.css">
 <meta name="viewport" content="width=device-width, intial-scale=1.0">
 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script> 	

 </head>
 <body class="newyork">
  <div class="page">
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


<table align="center" class="profile">
	<tr class="dionysus">
		<td>Full Name:</td>
		<td><?php echo $fname." ".$lname ?></td>
	</tr>

	<tr class="dionysus">
		<td>User Name:</td>
		<td><?php echo $uname ?></td>
	</tr>

	<tr class="dionysus">
		<td>Email:</td>
		<td><?php echo $email ?></td>
	</tr>

	<tr class="dionysus">
		<td>Date Of Birth:</td>
		<td><?php echo $dob ?></td>
	</tr>

	<tr class="dionysus">
		<td>Address:</td>
		<td><?php echo $address ?></td>
	</tr>
 
	<tr class="dionysus">
		<td>Post Code:</td>
		<td><?php echo $postcode ?></td>
	</tr>

	<tr class="dionysus">
		<td colspan="2" >
      <a href="updateprofile.php"><input type="button" class="button" value="Update Profile"></a></td>
    </td>
	</tr>

  <tr class="dionysus">
    <td colspan="2"><a href="changepassword.php"><input type="button" class="gretchen" value="Change Password"></a></td>
  </tr>

  <tr class="dionysus">
    <td colspan="2" class="history"><a href="History.php" class="history">My History</a></td>
  </tr>



</table>
 
 </body>

<div class="page">
  <footer class="jade3">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>

</div>
 </html>
