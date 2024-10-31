<?php  
include('Connect.php');
$CityID=$_REQUEST['CID'];

$Select="Select * from cities where CityID='$CityID'";
$Selrun=mysqli_query($connect,$Select);
$fetch=mysqli_fetch_array($Selrun);

$CityID=$fetch['CityID'];
$CityName=$fetch['CityName'];
$prate=$fetch['PollutionRate'];
$des=$fetch['Description'];
$area=$fetch['Area'];
$population=$fetch['Population'];
$ma=$fetch['MainAttraction'];

if (isset($_REQUEST['update'])) 
{
		
	$prate=$_REQUEST['prate'];
	$population=$_REQUEST['population'];
	$area=$_REQUEST['area'];
	$Description=$_REQUEST['des'];
	$ma=$_REQUEST['ma'];


	$Update="Update cities
			Set PollutionRate='$prate',Description='$Description',Area='$area',Population='$population',MainAttraction='$ma'
			Where CityID='$CityID'
			";
	$urun=mysqli_query($connect,$Update);

	if ($urun) 
	{
		echo "<script>window.alert('Updated successfully')</script>";
	}

	else
	{
		echo "<script>window.alert('Something went wrong')</script>";
	}
}

?>

<html>
<head>
	<title>CityUpdate</title>
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
             <!--  <a href="#"><i class="fas fa-home"></i> Home</a> -->
              <a href="AdminRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="AdminLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
              <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> 
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
	<table class="table">
		<tr>
			<th colspan="2">Update Cities Here</th>
		</tr>
		<tr>
			<td>City ID:</td>
			<td><input class="input" type="text" name="cid"  value="<?php echo $CityID ?>" readonly></td>
		</tr>

		<tr>
			<td>City Name:</td>
			<td><input class="input" type="text" name="cname" value="<?php echo $CityName ?>" readonly></td>
		</tr>

		<tr>
			<td>Pollution Rate:</td>
			<td><input class="input" type="text" name="prate" value="<?php echo $prate ?>"></td>
		</tr>

		<tr>
			<td>Area: </td>
			<td><input class="input" type="text" name="area" value="<?php echo $area ?>"></td>
		</tr>

		<tr>
			<td>Description:</td>
			<td><textarea class="ta" type="text" name="des" value="<?php echo $des ?>"></textarea></td>
		</tr>

		<tr>
			<td>Population:</td>
			<td><input class="input" type="text" name="population" value="<?php echo $population ?>"></td>
		</tr>

		<tr>
			<td>Main Attraction:</td>
			<td><input class="input" type="text" name="ma" value="<?php echo $ma ?>"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="update" value="Update" class="button"></td>
		</tr>

	</table>


</form>
</body>

<footer >
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>