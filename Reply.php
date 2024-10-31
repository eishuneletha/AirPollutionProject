<?php 
session_start();
include('Connect.php');

$QuestionID=$_REQUEST['QID'];
$select="Select * from contactfaq where QuestionID='$QuestionID'";
$selrun=mysqli_query($connect,$select);
$fetch=mysqli_fetch_array($selrun);

$question=$fetch['Question'];

if (!isset($_SESSION['AID'])) //other page twy mhr Permission pate chin yin thone
{
  echo "<script>window.alert('You have no permission.Please Login First')</script>";
  echo "<script>window.location='AdminLogin.php'</script>";
}

if (isset($_REQUEST['reply'])) 
{
  $adminid=$_SESSION['AID'];
  $qid=$_REQUEST['qid'];
  $reply=$_REQUEST['txtreply'];
  $date=$_REQUEST['date'];

   $insert="Insert into reply(AdminID, QuestionID,Answer,ReplyDate) values('$adminid','$qid','$reply','$date')";
  $irun=mysqli_query($connect,$insert);

  if ($irun) 
  {
   echo "<script>window.alert('Replied successfully')</script>";
  }

  else
  {
     echo "<script>window.alert('Something went wrong')</script>";

  }
}



 ?>
 <html>
 <head>
 	<title>Reply</title>
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
              <!-- <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
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

 	<form class="form" action="" method="post">
 		<table class="table">
 		<tr>
 			<td colspan="2">Question: <?php echo $question ?></td>
      <input type="hidden" name="qid" value="<?php echo $QuestionID ?>">
 		</tr>


 		<tr>
 			<td colspan="2">Reply: <input type="text" name="txtreply" class="input"></td>
 		</tr>

    <tr>
      <td colspan="2">ReplyDate:<input type="text" value="<?php echo date('Y/m/d') ?>" name="date" class="input"></td>
    </tr>

 		<tr>
 			<td colspan="2"><input type="submit" name="reply" value="Reply" class="button"></td>
 		</tr>
 		</table>
 	</form>
 </body>
 </html>