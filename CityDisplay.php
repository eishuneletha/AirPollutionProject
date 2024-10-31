<?php
session_start();
include('Connect.php');

$Select = "Select * from cities";
$selrun = mysqli_query($connect, $Select);

$crow = mysqli_num_rows($selrun);

if (isset($_REQUEST['btnsearch'])) {

  $Search = $_REQUEST['txtsearch'];
  $sel = "Select * from cities where CityName like'%$Search%'";
  $selrun = mysqli_query($connect, $sel);
  $crow = mysqli_num_rows($selrun);


  if (isset($_SESSION['UID'])) {
    $userid = $_SESSION['UID'];
    $search = $_REQUEST['txtsearch'];
    $date = date('Y-m-d');

    $insert = "Insert into history (UserID,SearchData,Date) values('$userid','$search','$date')";
    $insertrun = mysqli_query($connect, $insert);
  }
}

?>


<html>

<head>
  <meta charset="utf-8">
  <title>Cities</title>
  <link rel="stylesheet" type="text/css" href="Style.css">
  <meta name="viewport" content="width=device-width, intial-scale=1.0">
  <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>


</head>

<body>

  <div class="page2">

    <div class="head">
      <h1 class="title">Air Pollution</h1>

      <input type="checkbox" id="chk">
      <label for="chk" class="show-menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul class="menu">
        <a href="Homepage.php"><i class="fas fa-home"></i> Home</a>
        <a href="CityDisplay.php"><span><i class="fas fa-city"></i> Cities</span></a>
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


    <div class="banner">
      <img src="Images/newyork.gif">
      <p>
        If you are interested in learning more about air pollution in America, <br> <br>
        <a href="https://gispub.epa.gov/air/trendsreport/2019/#home"><input type="button" value="Visit Here" class="visit"></a>
      </p>
    </div>

  </div>









  <div class="cities">
    <p class="co">Now, lets check out the air pollution rates of each city in the United States of America. </p>


    <div class="koo">
      <form action="" method="post">


        <input type="text" class="kootxt" name="txtsearch" placeholder="Search cities here">
        <button type="submit" class="koobtn" name="btnsearch"><i class="fas fa-search"></i></button>
      </form>
    </div>


    <div class="icons">
      <ul>
        <a href="https://www.facebook.com/">
          <li class="facebook"><i class="fab fa-facebook"></i></li>
        </a>
        <a href="https://www.instagram.com/">
          <li class="instagram"><i class="fab fa-instagram"></i></li>
        </a>
        <a href="https://twitter.com/">
          <li class="twitter"><i class="fab fa-twitter"></i></li>
        </a>
        <a href="https://www.redditinc.com/">
          <li class="reddit"><i class="fab fa-reddit"></i></li>
        </a>



      </ul>
    </div>


    <div class="camila">
      <?php
      if ($crow == 0) {
        echo "<p>No cities found.</p>";
      }



      ?>


      <div class="prada">
        <table class="alvin">
          <?php
          for ($i = 0; $i < $crow; $i += 3) {
            echo "<tr>";
            if (isset($_REQUEST['btnsearch'])) {
              $csel2 = "Select * from cities where CityName like '%$Search%' limit $i,3";
              $cselrun = mysqli_query($connect, $csel2);
              $cselcount = mysqli_num_rows($cselrun);
            } else {
              $csel2 = "Select * from cities limit $i,3";
              $cselrun = mysqli_query($connect, $csel2);
              $cselcount = mysqli_num_rows($cselrun);
            }

            
            for ($j = 0; $j < $cselcount; $j++) {
              $cfetch = mysqli_fetch_array($cselrun);
              $cname = $cfetch['CityName'];
              $cimg = $cfetch['CityImage'];
              $pop = $cfetch['Population'];
              $cid = $cfetch['CityID'];
              echo "<td>";

          ?>

              <img src="<?php echo $cimg ?>"> <br>
              <p><b><?php echo $cname ?></b> is a city in the United States of America with <?php echo $pop ?> population...<br><br>
                <a href="CityDetail.php?CID=<?php echo $cid ?>"><input type="button" class="camilabtn" value="Read more" class="camilabtn"></a>
              </p>

          <?php
              echo "</td>";
            }

            echo "</tr>";
          }
          ?>


        </table>
      </div>



    </div>
  </div>




  <div id="map" style="width:400px; height: 400px; margin-left:50px ">
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
      var myMap;
      var myLatlng = new google.maps.LatLng(37.090240, -95.712891);

      function initialize() {
        var mapOptions = {
          zoom: 5,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          scrollwheel: false
        }
        myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
        // var marker = new google.maps.Marker({
        //     position: myLatlng,
        //     map: myMap,
        //     title: 'Name Of Business',
        //     icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
        // });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>





  </div>
  </div>
</body>

<div class="page2">
  <footer>
    <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

  </footer>
</div>

</html>