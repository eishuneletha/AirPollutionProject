<?php 
include('Connect.php');
$select="Select * from information i, admin a where i.AdminID=a.AdminID";
$selrun=mysqli_query($connect,$select);
$count=mysqli_num_rows($selrun);


 ?>


<html>
<head>
  <meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
</head>

<body class="">
  
<div class="page6">
  <div class="head">
   <h1 class="title">Air Pollution</h1>

   <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
        <i class="fas fa-bars"></i>
    </label>


          <ul class="menu">
              <a href="Homepage.php"><span><i class="fas fa-home"></i> Home</span></a>

              <a href="CityDisplay.php"> <i class="fas fa-city"></i> Cities</a>
               <a href="Homepage2.php">Articles</a>
                <a href="Campaigns.php">Campaigns</a>

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
</div> 
 
 <!-- 
 --><!-- <div class="page">  -->
<div class="jenga">
  <video autoplay muted loop>

      <source src="Images/airpollution.mp4" type="video/mp4" >
    
  </video>

  <div class="idk">
    <h2>Can we save our planet? <i class="fas fa-globe-americas"></i></h2>
    <p>Our planet is in crisis and our future is at sake. <br> But there are plenty of things we can do to save our planet not only for now but also for the sake of our future generations. <br>
     See our campaigns, do what you can to make changes for better hope, better life and better ecosystem. <i class="fas fa-spa"></i> <br>

      It all starts with you !! <br> <br>

      <a href="Campaigns.php">Checkout our campaigns <i class="fas fa-angle-double-right"></i></a>
    </p>
  </div> 
</div>
<!-- </div>
 -->
 
   
 


 <div class="icons">
    <ul>
      <a href="https://www.facebook.com/"><li class="facebook"><i class="fab fa-facebook"></i></li></a>
      <a href="https://www.instagram.com/"><li class="instagram"><i class="fab fa-instagram"></i></li></a>
      <a href="https://twitter.com/"><li class="twitter"><i class="fab fa-twitter"></i></li></a>
      <a href="https://www.redditinc.com/"><li class="reddit"><i class="fab fa-reddit"></i></li></a>
     
       

  
    </ul>
  </div>

<!-- <div class="author">
  <a href="Homepage2.php">Check out our Authors' posts <i class="fas fa-angle-double-right"></i></a>

</div> -->
 

 
   <div class="pollution">
  <div class="army">
      <h2>What is Air Pollution?</h2>

      <p>
        Air pollution is a side effect that causes from the release of impurities starting from cigarette smokes to chemical gases such as carbon dioxide,sulpher dioxide etc. into air which leads to damage starting from human health to the whole planet. <br> <br>
      </p>

       <img src="Images/Sources_Graphic_Huge.jpg" width="300" heigth="100">

  </div>



  
   
  



  <div class="holo">
    <h2> Air pollution effects to health</h2>
    <p> Having a polluted air is not only health damaging, but also is fatal. According to National geographic organization(NGO) and World Health Organization(WHO), on 2016, 4.2 million population died and 90 percent of them was from middle-income countries. Indoor smoke which causes from cooking, smoking and heating with coal, kerosene and burning biomass etc. became a threat to the health of 3 billion people around the world.
      In some cases, it has been stated that most lung cancers, heart diseases, stroke and asthema etc. are the consequences of having a air polluted environment. 
      </p> 

      <img src="Images/ap health.png" >
  </div>


  <div class="regina">
    <h2>Air pollution effects to mother nature</h2>
    <p>
      Along side with human health, air pollution can bring lots of climate damages such as acid raining, eutrophication and haze etc. Like humans, animals may also experience lots of health problems from breathing the polluted air. According to the researches, breathing a large amount of toxic air causes birth defects, reproduction faliure and chronic illnesses.
    </p>

    <img src="Images/Atmospheric-pathway-of-air-pollution.png">
  </div>
  
  <div class="america">
    <h2>Air Pollution in America</h2>
    <p>
      Iregardless, the effects of the air pollution differs from one place to another around the world. In United States of America,  the air pollution had started since the inception of Industrial Revolution. <br><br>
      According to the researches, America has been facing with 100000 popoulation of death each year because of air pollution. After a bunch of decades, America's air quality cannot be getting any cleaner. <br> <br>
      Thanks to the EPA's air toxics program, the nation's air pollutant concentration declined to around 98 percent on around 1990 to 2005.
      According to federal datas, America has been experencing with more air polluted days than recent years ago. Around 1980s, the nation's air pollution rate was around 20% and after passing a few decades, around 2013 to 2019 the nation had experienced 15% more days of air pollution than 1980s. These increasing of air pollution mostly comes from the increasement of the useage of vehicles, chemical gases from factories and from other sources. <br><br>
      Between 1980 and 2019, due to the nation's population has increased by 44 percent, the emission of carbon dioxide also increased around 15 percent. 

      You can visit the EPA's <a href="https://www.epa.gov/air-emissions-inventories/air-emissions-sources">Air Emissions Sources</a> sites to know more about national, state and local emission datas. <br> <br>

    </p>
    <img src="Images/3000.jpeg">
    <img src="Images/download.jpg">
  </div> 

</div>




 

<!-- 
 -->




<div class="reminder">
  <h2><i class="fas fa-info-circle"></i>Shout out</h2>
  <p> If you are interested in learning more informations about air pollution, you can visit <a href="https://www.nationalgeographic.com/environment/global-warming/pollution/">official National Geographic page</a> where you can find more details and facts about air pollution!

  </p>
 </div>  

 <div class="trinity">
  <a href="Homepage.php" class="top"><i class="fas fa-caret-up"></i> Scroll to top</a> <br><br>
 <a href="UserRegister.php"> <input type="button" class="yall" value="Sign-up for free"></a>
 <a href="CityDisplay.php"><input type="button" class="cd" value="Check out Cities"></a>
</div> 
 </div>

</body>
<div class="page6">
<footer>
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</div>
</html>