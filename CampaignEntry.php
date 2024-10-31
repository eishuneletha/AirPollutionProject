<?php
session_start(); 
	include('Connect.php');

	if (!isset($_SESSION['AID'])) 
	{
		echo "<script>window.alert('You have no authorization!Login as admin first')</script>";
		echo "<script>window.location='AdminLogin.php'</script>";
	}

	if (isset($_REQUEST['btn'])) 
	{
		$cname=$_REQUEST['cname'];
		$cdes=$_REQUEST['des'];

		$Image=$_FILES['cp']['name'];
		$folder="Images/";
		$filename=$folder."_".$Image;
		$copy=copy($_FILES['cp']['tmp_name'],$filename);
		if (!$copy) 
		{
			exit ('Something went wrong');
		}


		$cinsert="Insert into Campaigns (CampaignTitle, Description,Image) values ('$cname','$cdes','$filename')";
		$crun=mysqli_query($connect,$cinsert);


		if ($crun) 
		{
			echo "<script>window.alert('Insert successful')</script>";
		}

		else 
		{
			echo "<script>window.alert('Something went wrong')</script>";
		}
	}



 ?>


<html>
<head>
	<title>Campaign</title>
	 <link rel="stylesheet" type="text/css" href="Style.css">
   <meta name="viewport" content="width=device-width, intial-scale=1.0">
   <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
  
</head>
<body class="wall">

	<div class="page">
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
             <!--  <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
               <a href="Posts.php">Posts</a>
             <a href="Faq.php">Faqpage</a> 
             <a href="QuestionDisplay.php">Asked Questions</a>
             <a href="cityentry.php">City Entry</a>
             <a href="CampaignEntry.php"><span>CampaignEntry</span></a>
             <a href="KitEntry.php">KitEntry</a>
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


	 


<form action="" method="post" enctype="multipart/form-data" class="form" >
	<table class="table">
		<tr>
			<th colspan="2">Insert Campaigns Here <br></th>
		</tr>

		<tr>
			<td>Campaign Name:</td>
			<td><input type="text" name="cname" class="input"></td>
		</tr>

		<tr>
			<td>Campaign Description:</td>
			<td><textarea name="des" class="ta"></textarea></td>
		</tr>

		<tr>
			<td>Campaign Poster:</td>
			<td><input type="file" name="cp"></td>
		</tr>

		<tr>
			<td colspan="2"><input type="submit" name="btn" value="Submit" class="button"></td>
		</tr>



	</table>

	<?php  
	


	?>

</form>


 

 <table class="retro">
	<?php 
		$select="Select * from campaigns";
		$srun=mysqli_query($connect,$select);
		$srow=mysqli_num_rows($srun);


 	for ($i=0; $i <$srow; $i++) 
	{ 
		$sfetch=mysqli_fetch_array($srun);
		$title=$sfetch['CampaignTitle'];
		$description=$sfetch['Description'];
		$poster=$sfetch['Image'];
		$cid=$sfetch['CampaignID'];
 		
 	 ?>


	<tr>
		<td><img src="<?php echo $poster ?>" ><br></td>

		<td>
			<table width="70%">
				
				<tr>
					<td>Campaign ID;</td>
					<td><?php echo $cid ?></td>
				</tr>

				<tr>
					<td>Campaign Title:</td>
					<td><?php echo $title ?></td>
				</tr>


				<tr>
					<td>Description:</td>
					<td><?php echo $description ?></td>
				</tr>

				<tr>
					<td colspan="2"><a href="viewsupporters.php?CID=<?php echo $cid ?>"><input type="button" value="View Supporters" class="button"></a><br><br></td>
				</tr>

				<br><br><br><br>

				




			</table>
		</td>


	</tr>
 <?php 
 	}
 	  ?>

</table>

</body>


<footer class="page">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>
