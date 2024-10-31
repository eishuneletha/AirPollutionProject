<?php 
session_start();
include('Connect.php');

if (!isset($_SESSION['UID'])) 
{
	echo "<script>window.alert('You have no permission!Login first')</script>";
	echo "<script>window.location='UserLogin.php'</script>";
}

$UserID=$_SESSION['UID'];
$uselect="Select * from users where UserID='$UserID'";
$uselrun=mysqli_query($connect,$uselect);

$ufetch=mysqli_fetch_array($uselrun);
$uname=$ufetch['UserName'];
$uid=$ufetch['UserID'];


 ?>

 <html>
 <head>
 	<title>Contact Us</title>
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
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
             
              <a href="ContactUs.php"><span><i class="fas fa-smile"></i> Contact Us</span></a>  
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

  



  <form method="post" action="FaqDisplay.php" class="form" >
  	<table  class="table" width="40%">
      <tr>
        <th colspan="2">Ask questions here</th>
      </tr>

  		<tr>
	  		<td>Question  <i class="fas fa-question-circle"></i> :</td>
	  		<td><input name="question" class="qust"></td>
  		</tr>

  		<tr>
  			<td>Asked by:</td>
  			<td><input type="text" name="uname" value="<?php echo $uname ?>" readonly class="qust"></td>  
  		</tr>

  		<tr>
  			<td><input type="submit" name="submit" value="Submit" class="button"></td>
  		</tr>

  	</table>

<input type="hidden" name="uid" value="<?php echo $uid ?>">
  </form>

 </body>

 <footer class="jade2">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
 </html>