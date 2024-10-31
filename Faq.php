<?php  
session_start();
include('Connect.php');

if (!isset($_SESSION['AID'])) 
{
	echo "<script>window.alert('You have no authorization!Login as admin first')</script>";
	echo "<script>window.location='AdminLogin.php'</script>";
}

$AdminID=$_SESSION['AID'];
$aselect="Select * from admin where AdminID='$AdminID'";
$aselrun=mysqli_query($connect,$aselect);
$afetch=mysqli_fetch_array($aselrun);

$aname=$afetch['AdminName'];

if (isset($_REQUEST['btnsave'])) 
{
	$aid=$_REQUEST['aid'];
	$question=$_REQUEST['question'];
	$answer=$_REQUEST['answer'];

	$finsert="Insert into faq (AdminID,Question,Answer) values('$aid','$question','$answer')";
	$frun=mysqli_query($connect,$finsert);

	if ($frun) 
	{
		echo "<script>window.alert('Question saved')</script>";
	}

	else
	{
		echo "<script>window.alert('Something went wrong')</script>";
	}
}


?>
<html>
<head>
	<title>FAQ</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
</head>
<body class="wall">
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
             <a href="Faq.php"><span>Faqpage</span></a> 
             <a href="QuestionDisplay.php">Asked Questions</a>
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


<form method="post" action="" class="form">
	<table class="table">
		<tr>
			<th colspan="2">FAQ entry</th>
		</tr>	
		<tr>
			<td>Admin Name:</td>
			<td><input type="text" name="aname" value="<?php echo $aname ?>"readonly class="qust"></td>
		</tr>

		<tr>
			<td><input type="hidden" name="aid" value="<?php echo $AdminID ?>" class="qust"></td>
		</tr>

		<tr>
			<td>Question:</td>
			<td><input type="text" name="question"class="qust" ></td>
		</tr>

		<tr>
			<td>Answer:</td>
			<td><input type="text" name="answer" class="qust"></td>
		</tr>

		<tr>
		
			<td><input type="submit" name="btnsave" value="Save" class="button"></td>
		</tr>

		

	</table>


</form>
</body>

<footer>
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>