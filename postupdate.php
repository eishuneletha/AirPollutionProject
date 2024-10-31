 <?php 
include('Connect.php');
$InfoID=$_REQUEST['IID'];

$iselect="Select * from information i, admin a where i.AdminID=a.AdminID and i. InfoID='$InfoID'";
$iselrun=mysqli_query($connect,$iselect);
$ifetch=mysqli_fetch_array($iselrun);

$InfoID=$ifetch['InfoID'];
$title=$ifetch['Title'];
$content=$ifetch['Content'];
$aname=$ifetch['AdminName'];

if (isset($_REQUEST['submit'])) 
{
	$tt=$_REQUEST['title'];
	$ct=$_REQUEST['content'];

	$update="Update information
			set Title='$tt',Content='$ct'
			Where InfoID='$InfoID'";

	$urun=mysqli_query($connect,$update);
	if ($urun) 
	{
		echo "<script>window.alert('Update Successful')</script>";
	}

	else 
	{
		echo "<script>window.alert('Something went wrong')</script>";
	}
}


?>

<html>
<head>
	<title>Post Update</title>
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
             
              <a href="AdminRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="AdminLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
              <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
               <a href="Posts.php"><span>Posts</span></a>
              <a href="Faq.php">Faqpage</a> 
              <a href="QuestionDisplay.php">Asked Questions</a>
              <a href="cityentry.php"><span>City Entry</span></a>
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


	<form action="" method="post" class="form">
		<table align="center" class="table">
			<tr>
				<td>InfoID:</td>
				<td><input readonly type="text" value="<?php echo $InfoID ?>" class="input"></td>
			</tr>

			<tr>
				<td>Title:</td>
				<td><input type="text" value="<?php echo $title ?>" name="title" class="input"></td>
			</tr>

			<tr>
				<td>Content:</td>
				<td><input type="text" value="<?php echo $content ?>" name="content" class="input">

				</td>
			</tr>

			<tr>
				<td>Admin Name:</td>
				<td><input type="text" value="<?php echo $aname ?>" readonly class="input"></td>
			</tr>

			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Update" class="button"></td>
			</tr>


		</table>
	</form>
</body>


  <footer>
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>