<?php 
include('Connect.php');
$select="Select * from information i, admin a where i.AdminID=a.AdminID";
$selrun=mysqli_query($connect,$select);
$count=mysqli_num_rows($selrun);

 ?>

<html>
<head>
	<title>From our Authors</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
      <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>

<!--   <div class="container-fluid"> -->

<div class="navMenu">
  <div class="head">
   <h1 class="title">Air Pollution</h1>

   <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
        <i class="fas fa-bars"></i>
    </label>


          <ul class="menu">
              <a href="Homepage.php"><i class="fas fa-home"></i> Home</a>
              <a href="CityDisplay.php"> <i class="fas fa-city"></i> Cities</a>
               <a href="Homepage2.php"><span>Articles</span></a>
                <a href="Campaigns.php">Campaigns</a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a>  
               <a href="MyQuestions.php">My Questions</a>
               <a href="FaqDisplay.php">FAQ</a>
                <a href="viewprofile.php">MyProfile</a>
              <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times-circle"></i>
              </label>
           </ul>
                 
  </div> 

  </div>

<!--  </div> -->


 <div class="icons">
    <ul>
      <a href="https://www.facebook.com/"><li class="fb"><i class="fab fa-facebook"></i></li></a>
      <a href="https://www.instagram.com/"><li class="instagram"><i class="fab fa-instagram"></i></li></a>
      <a href="https://twitter.com/"><li class="twitter"><i class="fab fa-twitter"></i></li></a>
      <a href="https://www.redditinc.com/"><li class="reddit"><i class="fab fa-reddit"></i></li></a>
     
       

  
    </ul>
  </div>


<!-- <div class="container"> -->

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Images/nyc.gif" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" >
        <h1 id="billie" style="background:linear-gradient(to bottom right, #08C9F9,#C54AF3 );
  -webkit-text-fill-color:transparent;
  -webkit-background-clip:text;font-size:55px; padding-bottom:13px">Join One, get one!</h1>
        <p id="shake"> Did you know that you can get one free amazing home pollution kit that worth $250 once you join one of our campaign? <br> <br>If you haven't known about it yet, join one of them to get your prefered pollution kit.  </p>
       <a href="Campaigns.php"><input class="button" type="button" value="Join Now"></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Images/thriller.gif" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1 id="billie"  style="color:white;text;font-size:55px; padding-bottom:13px">For our customers</h1>
        <p id="shake">We have a FAQ program for our dearest customers where you can ask us any questions you like related to air pollution without having to pay a cent! We're going to answer your question within 24 hours!</p>
        <a href="ContactUs.php"><input class="button" type="button" value="Ask questions now "></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Images/chicago.gif" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1 id="billie">FAQ program</h1>
        <p id="shake">Recently, we have recieved lots of air pollution questions from our customers so we have created a new Faq page where you can search for questions and answers you like to know for free! <br> If you are a student or a person who like to make researches about air pollution, we consider this program might be helpful to you :3! </p>
        <a href="FaqDisplay.php"><input class="button" type="button" value="View Faqs "></a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 

<!-- </div> -->


<div class="blonde">
  
<table  class="alvin" >

  <?php 
    for ($i=0; $i <$count ; $i+=3) 
    { 

    echo "<div class='kourtney'>";
     echo "<tr>";
     $select2="Select * from information i, admin a where i.AdminID=a.AdminID Limit $i,3";
     $selrun2=mysqli_query($connect,$select2);
     $count2=mysqli_num_rows($selrun2);

      for ($g=0; $g < $count2; $g++)
      { 
       $fetch=mysqli_fetch_array($selrun2);
       $title=$fetch['Title'];
       $content=$fetch['Content'];
       $Name=$fetch['AdminName'];
       $Date=$fetch['Date'];
       $image=$fetch['Image'];
       echo "<td>";
  ?>


    <h2><?php echo $title ?></h2><br>
    <img src="<?php echo $image ?>" width="200" height="170">
    <p><?php echo $content ?></p><br>
    <p>Author: <i> <?php echo $Name ?> </i> on <i><?php echo $Date ?></i></p>

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