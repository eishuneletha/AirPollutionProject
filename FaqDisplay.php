<?php 
include('Connect.php');

$qselect="Select * from faq";
$qselrun=mysqli_query($connect,$qselect);
$qcount=mysqli_num_rows($qselrun);

if (isset($_REQUEST['submit'])) 
{
	$ques=$_REQUEST['question'];
	$uid=$_REQUEST['uid'];
}

if (isset($_REQUEST['askconfirm'])) 
{
	$question=$_REQUEST['txtques'];
	$UserID=$_REQUEST['UserID']; //or $UserID=$_SESSION['UID'];

	$qinsert="Insert into contactfaq (Question,UserID) values ('$question','$UserID')";
	$qrun=mysqli_query($connect,$qinsert);

	if ($qrun) 
	{
		echo "<script>window.alert('Question is asked')</script>";
		echo "<script>window.location='ContactUs.php'</script>";
	}

	else
	{
		echo "<script>window.alert('Something went wrong')</script>";
	}
}


 ?>
 <html>
 <head>
 	<title>FaqDisplay</title>
 	<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
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
               <a href="MyQuestions.php">My Questions</a> 
              <a href="FaqDisplay.php"><span>FAQ</span></a>
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



  <table class="faqtable" cellspacing="10" cellpadding="10" border="1">
    <tr>
      <th colspan="2">View Faqs here</th>
    </tr>

  	<tr class="tbltitle">
  		<th>Question</th>
  		<th>Answer</th>
  	</tr>

  	<?php 
  	for ($i=0; $i <$qcount ; $i++) 
  	{ 
  		$qfetch=mysqli_fetch_array($qselrun);
  		$question=$qfetch['Question'];
  		$Answer=$qfetch['Answer'];
  	 ?>

  	 <tr align="left">
  	 	<td><?php echo $question ?></td>
  	 	<td><?php echo $Answer ?></td>
  	 </tr>

  	 <?php 
  	 }

  	  ?>

  	 <form action="" method="post">
  	 	<input type="hidden" name="txtques" value="<?php echo $ques ?>" >
  	 	<input type="hidden" name="UserID" value="<?php echo $uid ?>">

    <div class="bruh"><p class="duh">Please look for the answer and question that suits your needs in the shown frequently answered questions.If you haven't found the answers you want, </p> 	<input type="submit" name="askconfirm" value="Ask Anyways!" class="ask"></div>  

  	 </form>
  </table>
 </body>

<div class="page">
 <footer class="jade2">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>

</div>
 </html>