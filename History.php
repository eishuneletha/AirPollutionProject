<?php  
include('connect.php');
session_start();

$UserID=$_SESSION['UID'];
$hselect="Select * from history where UserID='$UserID'";
$hrun=mysqli_query($connect,$hselect);
$hcount=mysqli_num_rows($hrun);

 if (isset($_REQUEST['btnsubmit'])) 
 {
	$SearchType=$_REQUEST['rdosearch'];

	if ($SearchType=='data') 
	{
		$Search=$_REQUEST['txtsearch'];
		$select="Select * from history h, users u where h.UserID=u.UserID and u.UserID='$UserID' and SearchData='$Search'";
		$hrun=mysqli_query($connect,$select);
		$hcount=mysqli_num_rows($hrun);
	}

	if ($SearchType=='date') 
	{
		$fromdate=$_REQUEST['txtfrom'];
		$todate=$_REQUEST['txtto'];
		echo $select="Select * from history h, users u where h.UserID=u.UserID and u.UserID='$UserID' and Date between '$fromdate' and '$todate' ";
		$hrun=mysqli_query($connect,$select);
		$hcount=mysqli_num_rows($hrun);
	}
 }

?>
<html>
<head>
	<title>History</title>
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
               <a href="CityDisplay.php"><i class="fas fa-city"></i> Cities</a> 
                <a href="Homepage2.php">Articles</a>
                <a href="Campaigns.php">Campaigns</a>

              <a href="UserRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
             
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a>
              <a href="MyQuestions.php">My Questions</a>
              <a href="FaqDisplay.php">FAQ</a>
              <a href="viewprofile.php"><span>My Profile</span></a>
           
              <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times-circle"></i>
              </label>
           </ul>
                 
  </div>

  </div>



 <div class="icons">
    <ul>
      <a href="https://www.facebook.com/"><li class="facebook"><i class="fab fa-facebook"></i></li></a>
      <a href="https://www.instagram.com/"><li class="instagram"><i class="fab fa-instagram"></i></li></a>
      <a href="https://twitter.com/"><li class="twitter"><i class="fab fa-twitter"></i></li></a>
      <a href="https://www.redditinc.com/"><li class="reddit"><i class="fab fa-reddit"></i></li></a>
       

  
    </ul>
  </div>

  <?php  
  	if ($hcount==0) 
  	{
  		echo "<h2>No history to see</h2>";
  	}

  	else
  	{




  ?>

<div class="poker">
  <form action="" method="post">
  	<table width="100%" align="center" class="janis">
  		<tr>
  			<td><input type="radio" name="rdosearch" value="data" >Search by data</td>
  			<td><input type="radio" name="rdosearch" value="date" >Search by date</td>
  		</tr>

  		<tr>
  			<td><input type="text" name="txtsearch" class="niki"></td>
  			<td>
  				From date: <input type="date" name="txtfrom" class="minaj">
  				To date: <input type="date" name="txtto" class="minaj">
  			</td>
  		</tr>

  		<tr>
  			<td colspan="2">
           <input type="submit" name="btnsubmit" value="Search" class="kendall"> 
          
        </td>
  		</tr>

  	</table>

  </form>



<table align="center" class="legal" width="100%">
	<tr>
		
		<th>Searched date</th>
		<th>Data searched</th>
		<th>Action</th>
	</tr>

	<?php 
		for ($i=0; $i <$hcount; $i++) 
		{ 
			$hfetch=mysqli_fetch_array($hrun);
			$uid=$hfetch['UserID'];
			$sdate=$hfetch['Date'];
			$data=$hfetch['SearchData'];
			$historyID=$hfetch['HistoryID'];


	 ?>

	 <tr align="center">
	 	
	 	<td><?php echo $sdate ?></td>
	 	<td><?php echo $data ?></td>
	 	<td><a href="DeleteHistory.php?HID=<?php echo $historyID ?>" >Delete History</a></td>
	 </tr>


	 <?php 
		}
	  ?>

	
</table>

<form  method="post" action="DeleteHistory.php">
	<p align="center">
		<input type="submit" name="delall" value="Delete All" class="delete">
		<input type="hidden" name="txtuid" value="<?php echo $uid ?>">
	</p>
</form>

<?php 
	}

 ?>

</div>
</body>


  <footer class="page">
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>