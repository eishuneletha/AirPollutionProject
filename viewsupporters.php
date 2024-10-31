<?php  
include('Connect.php');

$CampaignID=$_REQUEST['CID'];
 $Select="Select * from campaigns c, campaignsignup s where c.CampaignID=s.CampaignID and c.CampaignID='$CampaignID'";
$selrun=mysqli_query($connect,$Select);
$srow=mysqli_num_rows($selrun);

?>

<html>
<head>
	<title>Supporters of this campaign</title>
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
             <!--  <a href="#"><i class="fas fa-home"></i> Home</a> -->
              <a href="AdminRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="AdminLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
             <!--  <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
               <a href="Posts.php">Posts</a>
             <a href="Faq.php">Faqpage</a> 
             <a href="QuestionDisplay.php">Asked Questions</a>
             <a href="cityentry.php">City Entry</a>
             <a href="CampaignEntry.php"><span>CampaignEntry</span></a>
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



<div class="tori">
<p>This campaign is supported by <?php echo $srow ?> people</p>
</div>

</body>
<footer class="vega">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>

</html>