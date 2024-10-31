<?php 
session_start();
include('Connect.php');

$Select="Select * from users u,contactfaq c where u.UserID=c.UserID";
$selrun=mysqli_query($connect,$Select);
$qcount=mysqli_num_rows($selrun);


if (!isset($_SESSION['AID'])) 
  {
    echo "<script>window.alert('You have no authorization!Login as admin first')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
  }

if (isset($_REQUEST['btnsearch'])) 
{
 $searchtype=$_REQUEST['rdosearch'];

  if ($searchtype=='QID') 
  {
    $QuestionID=$_REQUEST['selqid'];
    $Select="Select * from users u, contactfaq c where u.UserID=c.UserID and c.QuestionID='$QuestionID'";
    $selrun=mysqli_query($connect,$Select);
    $qcount=mysqli_num_rows($selrun);
  }
} 

 ?>
 <html>
 <head>
 	<title>Asked Questions</title>
 	<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 </head>
 <body class="newyork">
 	<div class="head">
    <h1 class="title">Air Pollution</h1>

   <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
        <i class="fas fa-bars"></i>
    </label>


          <ul class="menu">
               <a href="AdminRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="AdminLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
             <!--  <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
               <a href="Posts.php">Posts</a>
             <a href="Faq.php">Faqpage</a> 
             <a href="QuestionDisplay.php"><span>Asked Questions</span></a>
             <a href="cityentry.php">City Entry</a>
             <a href="CampaignEntry.php">CampaignEntry</a>
             <a href="KitEntry.php">KitEntry</a>
             <a href="KitList.php">KitList</a>

              <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times-circle"></i>
              </label>
           </ul>
                 
  </div>

   <div class="icons">
    <ul>
      <a href="https://www.facebook.com/"><li class="facebook"><i class="fab fa-facebook"></i></li></a>
      <a href="https://www.instagram.com/"><li class="instagram"><i class="fab fa-instagram"></i></li></a>
      <a href="https://twitter.com/"><li class="twitter"><i class="fab fa-twitter"></i></li></a>
      <a href="https://www.redditinc.com/"><li class="reddit"><i class="fab fa-reddit"></i></li></a>
    </ul>
  </div>



<form action="" method="post">
    <table class="tbl">
      <tr>
        <td class="question">
          <input type="radio" name="rdosearch" value="QID">Search by QuestionID
          <br>
          <select name="selqid" class="row">
            <?php 
              $Qselect="Select * from contactfaq ";
              $Qselrun=mysqli_query($connect,$Qselect);
              $Qcount=mysqli_num_rows($Qselrun);

              for ($i=0; $i <$Qcount ; $i++) 
              { 
                $Qfetch=mysqli_fetch_array($Qselrun);
                $Qid=$Qfetch['QuestionID'];

                echo "<option value='$Qid'>$Qid</option>";
              }

             ?>
          </select>
        </td>

        <td class="user">
          <input type="radio" name="rdosearch" value="UID">Search by UserID
        </td> 


        <td>
          <input type="submit" name="btnsearch"  value="Search" class="srch">
        </td>

      </tr>

     </table>

</form>  

  


 
    <?php
           $Qselect="Select * from users u, contactfaq c where u.UserID=c.UserID ";
              $Qselrun=mysqli_query($connect,$Qselect);
              $Qcount=mysqli_num_rows($Qselrun);


  for ($i=0; $i <$Qcount ; $i++) 
  {
    
    $qfetch=mysqli_fetch_array($Qselrun);
    $question=$qfetch['Question'];
    $fname=$qfetch['FirstName'];
    $lname=$qfetch['LastName'];
    $qid=$qfetch['QuestionID'];
  ?>
    <!-- <p>Question:   <?php echo $question ?></p>
    <p>Asked By:   <?php echo $fname ?>  <?php echo $lname ?></p>
    <p><a href="Reply.php?QID=<?php echo $qid ?>"><input type="button" class="button" value="Reply Now"></a></p> <br><br> -->

    <table class="retro" cellpadding="20">
      <tr>
        <td><br>Question:</td>
        <td><br><br><?php echo $question ?></td>
      </tr>


      <tr>
        <td>Asked By:</td>
        <td><?php echo $fname ?>  <?php echo $lname ?></td>
      </tr>

      <tr>
        <td colspan="2"><a href="Reply.php?QID=<?php echo $qid ?>"><input type="button" class="button" value="Reply Now"></a><br><br></td> 
      </tr>

      <br><br>

    </table>

  <?php  
     } 
  ?>

<!-- </form> -->




 </body>

 <footer>
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
 </html>