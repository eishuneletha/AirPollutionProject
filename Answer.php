<?php  
session_start();
include('Connect.php');
$QuestionID=$_REQUEST['QID'];
$Select="Select * from reply r, contactfaq c, admin a where r.QuestionID=c.QuestionID and r.AdminID=a.AdminID and r.QuestionID='$QuestionID'";
$selrun=mysqli_query($connect,$Select);
$selcount=mysqli_num_rows($selrun);

if (!isset($_SESSION['UID'])) 
{
	echo "<script>window.alert('You don't have permission.Please login first)</script>";
	echo "<script>window.location='UserLogin.php'</script>";
}

if ($selcount==0) 
{
	echo "<script>window.alert('Your question has not been replied yet!We are trying! please wait for a moment!' )</script>";
	// echo "<script>window.location='MyQuestions.php'</script>";
}

?>
<html>
<head>
	<title>Answers</title>
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
              <a href="CityDisplay.php"> <i class="fas fa-city"></i> Cities</a>
               <a href="Homepage2.php">Articles</a>
                <a href="Campaigns.php">Campaigns</a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a>  
               <a href="MyQuestions.php"><span>My Questions</span></a>
               <a href="FaqDisplay.php">FAQ</a>
                <a href="viewprofile.php">MyProfile</a>
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

<table align="center" class="faqtable" width="90%" align="center" cellspacing="10" cellpadding="10">
	<tr>
		<th>Question</th>
		<th>Answer</th>
		<th>Replied Date</th>
		<th>Answered by</th>
	</tr>

	<?php  
	for ($i=0; $i <$selcount ; $i++) 
	{ 
		$fetch=mysqli_fetch_array($selrun);
		$question=$fetch['Question'];
		$answer=$fetch['Answer'];
		$date=$fetch['ReplyDate'];
		$admin=$fetch['UserName'];
	?>

	<tr align="center">
		<td><?php echo $question ?></td>
		<td><?php echo $answer ?></td>
		<td><?php echo $date ?></td>
		<td><?php echo $admin ?></td>
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