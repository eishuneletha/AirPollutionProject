<?php 
session_start();
include('Connect.php');

if (!isset($_SESSION['AID'])) 
{
	echo "<script>window.alert('You have no authorization!Login as admin first')</script>";
	echo "<script>window.location='AdminLogin.php'</script>";
}

// $AdminID=$_SESSION['AID'];
// $aselect="Select * from admin where AdminID='$AdminID'";
// $aselrun=mysqli_query($connect,$aselect);
// $afetch=mysqli_fetch_array($aselrun);

// $aname=$afetch['AdminName'];



if (isset($_REQUEST['enter'])) 
{
	$Cname=$_REQUEST['cname'];

	$Image=$_FILES['cimg']['name'];
	$folder="Images/";
	$filename=$folder."_".$Image;
	$copy=copy($_FILES['cimg']['tmp_name'],$filename);
	if (!$copy) 
	{
		exit ('Something went wrong');
	}

	$Description=$_REQUEST['description'];
	$population=$_REQUEST['population'];
	$Prate=$_REQUEST['rate'];
	$area=$_REQUEST['area'];
	$ma=$_REQUEST['ma'];
	$date=$_REQUEST['date'];

	$insert="Insert into cities(CityName,CityImage,Description,Population,PollutionRate,Area,MainAttraction,Date) values ('$Cname','$filename','$Description','$population','$Prate','$area','$ma','$date')";
	$irun=mysqli_query($connect,$insert);

	if ($irun) 
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
 	<title>CityEntry</title>
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
             <!--  <a href="#"><i class="fas fa-home"></i> Home</a> -->
              <a href="AdminRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="AdminLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
             <!--  <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
               <a href="Posts.php">Posts</a>
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
 	<table class="table">
 		<tr>
 			<th colspan="2">Enter Cities Here <br></th>
 		</tr>
 		<tr>
 			<td>City Name:</td>
 			<td><input class="input" type="text" name="cname"></td>
 		</tr>

 		
 		<tr>
 			<td>City Image</td>
 			<td><input type="file" name="cimg"></td>
 		</tr>

 		<tr>
 			<td>Description</td>
 			<td><textarea class="ta" type="text" name="description"> </textarea></td>
 		</tr>

 		<tr>
 			<td>Population</td>
 			<td><input class="input" type="text" name="population"></td>
 		</tr>

 		<tr>
 			<td>Pollution Rate:</td>
 			<td><input class="input" type="text" name="rate"></td>
 		</tr>

 		<tr>
 			<td>Area:</td>
 			<td><input class="input" type="text" name="area"></td>
 		</tr>

 		<tr>
 			<td>Main Attraction:</td>
 			<td><input class="input" type="text" name="ma"></td>
 		</tr>

 		<tr>
 			<td>Date:</td>
 			<td><input class="input" type="text" name="date" value="<?php echo date('m/d/Y') ?>"></td>
 		</tr>

 		<tr>
 			<td colspan="2"><input type="submit" name="enter" value="Enter" class="button"></td>
 		</tr>
 	</table>

 	<?php 
 	$csel="Select * from cities ";
 	$cselrun=mysqli_query($connect,$csel);
 	$ccount=mysqli_num_rows($cselrun);

 	 ?>
 </form>

<table class="retro">
	
	<?php 
		$csel="Select * from cities ";
 	$cselrun=mysqli_query($connect,$csel);
 	$ccount=mysqli_num_rows($cselrun);
 	for ($i=0; $i <$ccount; $i++)
 	{ 
 		$cfetch=mysqli_fetch_array($cselrun);
 		$cname=$cfetch['CityName'];
 		$cimg=$cfetch['CityImage'];
 		$description=$cfetch['Description'];
 		$prate=$cfetch['PollutionRate'];
 		$area=$cfetch['Area'];
 		$ma=$cfetch['MainAttraction'];
 		$cid=$cfetch['CityID'];
 		$date=$cfetch['Date'];
 		$pop=$cfetch['Population'];
 	 ?>


	<tr>


		<td><img src="<?php echo $cimg ?>" ><br></td>

		<td>
			<table width="70%">
				<tr>
					<td>City ID: <br> <br></td>
					<td><?php echo $cid ?> <hr></td>
				</tr>

				<tr>
					<td>City Name: <br><br></td>
					<td><?php echo $cname ?> <hr></td>
				</tr>
			

				<tr>
					<td>Description: <br><br> </td>
					<td><?php echo $description ?><hr></td>
				</tr>

				<tr>
					<td>City Area: <br><br></td>
					<td><?php echo $area ?><hr></td>
				</tr>

				<tr>
					<td>Main Attraction: <br><br></td>
					<td><?php echo $ma ?><hr></td>
				</tr>

				<tr>
					<td>Pollution Rate:<br><br></td>
					<td><?php echo $prate ?><hr></td>
				</tr>

				<tr>
					<td>Population: <br><br></td>
					<td><?php echo $pop ?><hr></td>
				</tr>

				<tr>
					<td>Date: <br><br></td>
					<td><?php echo $date ?><hr></td>
				</tr>

				<tr>
					<td colspan="2"><a href="cityupdate.php?CID=<?php echo $cid ?>" ><input type="button" value="Update" class="button"></a><br><br></td>

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