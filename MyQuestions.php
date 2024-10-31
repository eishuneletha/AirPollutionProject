<?php  
include('Connect.php');

session_start();

if (isset($_SESSION['UID'])) 
{
	$userid=$_SESSION['UID'];
	$qselect="Select * from contactfaq c, users u where c.UserID=u.UserID and u.UserID='$userid'";
	$qrun=mysqli_query($connect,$qselect);
	$count=mysqli_num_rows($qrun);
}



?>
<html>
<head>
	<title>My Questions</title>
		<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
               <a href="CityDisplay.php"><i class="fas fa-city"></i> Cities </a> 
                <a href="Homepage2.php">Articles</a>
                <a href="Campaigns.php">Campaigns</a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
      
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a> 
              <a href="MyQuestions.php"><span>My Questions</span></a>
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
</div>

  <table align="center" class="faqtable" width="90%" align="center" cellspacing="10" cellpadding="10">
  	<tr align="center">
  		<th>Questions I've asked</th>
  		<th>Action</th>
  	</tr>

  	<?php  
  	for ($i=0; $i <$count ; $i++) 
  	{ 
  		$qfetch=mysqli_fetch_array($qrun);
  		$question=$qfetch['Question'];
  		$qid=$qfetch['QuestionID'];
  	
  	?>

  		<tr  align="center">
  			<td><?php echo $question ?></td>
  			<td><a href="Answer.php?QID=<?php echo $qid ?>"><input type="button" value="View Answer" class="button"></a></td>
  		</tr>

  	<?php 
  		}
  	 ?>





  </table>
</body>

<div class="page">
<footer class="jade2">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</div>
</html>
