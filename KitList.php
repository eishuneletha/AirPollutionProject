<?php
session_start();  
include('Connect.php');
$sel="Select * from kitdetail kd, users u, kits k where kd.KitID=k.KitID and u.UserID=kd.UserID";
$selrun=mysqli_query($connect,$sel);
$selcount=mysqli_num_rows($selrun);

if (!isset($_SESSION['AID'])) 
	{
		echo "<script>window.alert('You have no authorization!Login as admin first')</script>";
		echo "<script>window.location='AdminLogin.php'</script>";
	}



?>


<html>
<head>
	<title>Kit List</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
</head>
<body class="wall">

<div class="page4">
<div class="head">
   <h1 class="title">Air Pollution</h1>

   <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
        <i class="fas fa-bars"></i>
    </label>
           <ul class="menu">
             <!--  <a href="#"><i class="fas fa-home"></i> Home</a> -->
              <a href="AdminRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="AdminLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
              <!-- <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
               <a href="Posts.php">Posts</a>
             <a href="Faq.php">Faqpage</a> 
             <a href="QuestionDisplay.php">Asked Questions</a>
             <a href="cityentry.php">City Entry</a>
             <a href="CampaignEntry.php">CampaignEntry</a>
             <a href="KitEntry.php">KitEntry</a>
             <a href="KitList.php"><span>KitList</span></a>
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

 
<div class="poker">
<table width="100%" class="legal">
	<tr text-align="center">
		<th>User Full Name <hr></th>
		<th>Claimed Kit <hr></th>
		<th>Date <hr></th>
		<th>Address <hr></th>
	</tr>

	<?php  
	for ($i=0; $i <$selcount ; $i++) 
	{ 
		$fetch=mysqli_fetch_array($selrun);
		$fname=$fetch['FirstName'];
		$lname=$fetch['LastName'];
		$kit=$fetch['KitName'];
		$date=$fetch['Date'];
		$add=$fetch['DeliveryAddress'];
	

	?>

	<tr align="center">
		<td><?php echo $fname." ".$lname ?></td>
		<td><?php echo $kit ?></td>
		<td><?php echo $date ?></td>
		<td><?php echo $add ?></td>
	</tr>


	<?php  
	}
	?>




</table>

</div>
</body>
<div class="page4">
<footer class="vega">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>

</div>
</html>