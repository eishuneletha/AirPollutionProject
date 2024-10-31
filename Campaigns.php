<?php  
include('Connect.php');
$Select="Select * from campaigns";
$selrun=mysqli_query($connect,$Select);
$srow=mysqli_num_rows($selrun);

?>

<html>
<head>
	<title>Campaigns</title>
  <link rel="stylesheet" type="text/css" href="Style.css">
   <meta name="viewport" content="width=device-width, intial-scale=1.0">
   <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
  

 
<body>
   <div class="head">
   <h1 class="title">Air Pollution</h1>

   <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
       <i class="fas fa-bars"></i>
    </label>


          <ul class="menu">
              <a href="Homepage.php"><i class="fas fa-home"></i> Home</a>

              <a href="CityDisplay.php"> <i class="fas fa-city"></i> Cities</a>
               <a href="Homepage2.php">Articles</a>
                <a href="Campaigns.php"><span>Campaigns</span></a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a>  
               <a href="MyQuestions.php">My Questions</a>
               <a href="FaqDisplay.php">FAQ</a>
                <a href="viewprofile.php">My Profile</a>
              <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times-circle"></i>
              </label>
           </ul>
                 
  </div>


   <div class="icons">
    <ul>
      <a href="https://www.facebook.com/"><li class="fb"><i class="fab fa-facebook"></i></li></a>
      <a href="https://www.instagram.com/"><li class="instagram"><i class="fab fa-instagram"></i></li></a>
      <a href="https://twitter.com/"><li class="twitter"><i class="fab fa-twitter"></i></li></a>
      <a href="https://www.redditinc.com/"><li class="reddit"><i class="fab fa-reddit"></i></li></a>
     
       

  
    </ul>
  </div>


 

 

<div class="banner2">
     <img src="Images/newyork2.gif"> 
      <p>"There is so much pollution in the air now that if it weren't for our lungs, there will be no place to put it all"<br><br>
        -Robert Orben
      </p>
    </div>
 


<div class="damien">
  
<table  class="alvin" >

  <?php 
    for ($i=0; $i <$srow ; $i+=3) 
    { 

    echo "<div class='kourtney'>";
     echo "<tr>";
     $select2="Select * from campaigns Limit $i,3";
     $selrun2=mysqli_query($connect,$select2);
     $count2=mysqli_num_rows($selrun2);

      for ($g=0; $g < $count2; $g++)
      { 
       $fetch=mysqli_fetch_array($selrun2);
       $cid=$fetch['CampaignID'];
      	$title=$fetch['CampaignTitle'];
      	$description=$fetch['Description'];
      	$Image=$fetch['Image'];
       echo "<td>";
  ?>


    <h2><?php echo $title ?></h2><br>
    <img src="<?php echo $Image ?>" width="200" height="170">
    <p><?php echo $description ?></p><br>
    <button class="sugar"><a href="CampaignSignUp.php?CID=<?php echo $cid ?>">Join Campaign Now</a></button>

  <?php     
        echo "</td>";
       }

      echo "</tr>";
      echo "</div>";
    }
  ?>

</table>

</div>
</body>

<footer>
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>