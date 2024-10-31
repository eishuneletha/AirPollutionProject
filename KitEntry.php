<?php  
session_start();
include('Connect.php');

if (!isset($_SESSION['AID'])) 
	{
		echo "<script>window.alert('You have no authorization!Login as admin first')</script>";
		echo "<script>window.location='AdminLogin.php'</script>";
	}

if (isset($_REQUEST['save'])) 
{
	$ap=$_REQUEST['txtkname'];
	$access=$_REQUEST['access'];
	$des=$_REQUEST['description'];

	$Image=$_FILES['img']['name'];
	$folder="Images/";
	$filename=$folder."_".$Image;
	$copy=copy($_FILES['img']['tmp_name'],$filename);
	if (!$copy) 
	{
		exit ('Something went wrong');
	}

	$kinsert="Insert Into kits (KitName, Accessories,Description, KitImage) values ('$ap','$access','$des','$filename')";
	$krun=mysqli_query($connect,$kinsert);
	if ($krun) 
	{
		echo "<script>window.alert('Inserted successfully')</script>";
	}

	else 
	{
		echo "<script>window.alert('Something went wrong')</script>";
	}

}



?>





<html>
<head>
	<title>Kit Entry</title>
	
	<link rel="stylesheet" type="text/css" href="Style.css">
	 <meta name="viewport" content="width=device-width, intial-scale=1.0">
	 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
</head>
<body class="newyork">
	<div class="page2">
	<div class="head">
    <h1 class="title">Air Pollution</h1>

   <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-bars"></i>
    </label>


          <ul class="menu">
             <!--  <a href="#"><i class="fas fa-home"></i> Home</a> -->
              <a href="AdminRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="AdminLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
              <!-- <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
               <a href="Posts.php">Posts</a>
             <a href="Faq.php">Faqpage</a> 
             <a href="QuestionDisplay.php">Asked Questions</a>
             <a href="cityentry.php">City Entry</a>
             <a href="CampaignEntry.php">CampaignEntry</a>
             <a href="KitEntry.php"><span>KitEntry</span></a>
             <a href="KitList.php">KitList</a>
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


<form action="" method="post" enctype="multipart/form-data" class="form">
	<table class="table" >
		<tr>
			<th colspan="2">Insert Free Kits Here</th>
		</tr>

		<tr>
			<td>Air Pollution Kit:</td>
			<td><input type="text" name="txtkname" class="input"></td>
		</tr>

		<tr>
			<td>Accessories:</td>
			<td><textarea name="access" class="ta"></textarea></td>
		</tr>

		<tr>
			<td>Description:</td>
			<td><textarea name="description" class="ta"></textarea></td>
		</tr>

		<tr>
			<td>Kit Image:</td>
			<td><input type="file" name="img"></td>
		</tr>

		<tr>
			<td colspan="2"><input type="submit" name="save" value="Save" class="button"></td>

		</tr>

	</table>

<?php  
	$Select="Select * from kits";
	$kselrun=mysqli_query($connect,$Select);
	$krow=mysqli_num_rows($kselrun);


?>
</form>



 <div class="retro">
 	<?php 
		$Select="Select * from kits";
		$kselrun=mysqli_query($connect,$Select);
		$krow=mysqli_num_rows($kselrun);


 	for ($i=0; $i <$krow; $i++) 
	{ 
		$kfetch=mysqli_fetch_array($kselrun);
		$ap=$kfetch['KitName'];
		$ac=$kfetch['Accessories'];
		$des=$kfetch['Description'];
		$img=$kfetch['KitImage'];
 		
 	 ?>


 	<br><br> <img src="<?php echo $img ?>" text-align="center" class="matrix"> <br>
 	 <p>Kit Name: <?php echo $ap ?></p>
 	 <p>Accessories: <?php echo $ac ?></p>
 	 <p>Description: <?php echo $des ?></p> <br><br>
 	 <?php 
 	}
 	 ?>





 </div>
</body>

 <footer class="page2">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>