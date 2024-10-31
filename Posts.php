<?php 
session_start();
include('Connect.php');

if (!isset($_SESSION['AID'])) 
{
	echo "<script>window.alert('You have no permission.Login first')</script>";
	echo "<script>window.location='AdminLogin.php'</script>";
}

$AdminID=$_SESSION['AID'];
$Select="Select * from admin where AdminID='$AdminID'";
$SelectRun=mysqli_query($connect,$Select);
$afetch=mysqli_fetch_array($SelectRun);
$aname=$afetch['AdminName'];



if (isset($_REQUEST['publish'])) 
{
	$title=$_REQUEST['title'];
	$content=$_REQUEST['content'];
	$author=$_REQUEST['admin'];
	$Date=date('Y-m-d');

	$image=$_FILES['pimg']['name'];
	$folder="Images/";
	$filename=$folder."_".$image;
	$copy=copy($_FILES['pimg']['tmp_name'],$filename);
	if (!$copy) 
	{
		exit ('Something went wrong');
	}



	$insert="Insert into information(Title,Image,Content,AdminID,Date) values('$title','$filename','$content','$AdminID','$Date')";
	$irun=mysqli_query($connect,$insert);
	if ($irun) 
	{
		echo "<script>window.alert('Inserted successfully')</script>";
	}
	else
	{
		echo "<script>window.alert('Something went wrong')</script>";
		echo mysqli_error($connect);
	}

}
?>

<html>
<head>
	<title>Post Entry</title>
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
             
              <a href="AdminRegister.php"><i class="fas fa-cash-register"></i> Register</a>
              <a href="AdminLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
             <!--  <a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a> -->
               <a href="Posts.php"><span>Posts</span></a>
             <a href="Faq.php">Faqpage</a> 
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


<form method="post" action="" enctype="multipart/form-data" class="form">
<table align="center" class="table">
	<tr>
		<th colspan="2">Write your Articles Here <br></th>
	</tr>

	<tr>
		<td>Title:</td>
		<td><textarea name="title" class="ta"></textarea></td>
	</tr>

	<tr>
		<td>Content:</td>
		<td><textarea name="content" class="ta"></textarea></td>
	</tr>

	<tr>
		<td>Image:</td>
		<td><input type="file" name="pimg"></td>

	</tr>	

	<tr>
		<td>Author: </td>
		<td><input type="text" name="admin" value="<?php echo $aname ?>" class="input"></td>
	</tr>



	<tr>
		
		<td colspan="2"><input type="submit" name="publish" value="Publish" class="button"></td>
	</tr>


</table>
</form>



<hr>



<table class="retro">
	<?php 
		$pselect="Select * from Information i, Admin a where i.AdminID=a.AdminID";
		$pselrun=mysqli_query($connect,$pselect);
		$prow=mysqli_num_rows($pselrun);

 	for ($i=0; $i <$prow; $i++) 
	{ 
		$fetch=mysqli_fetch_array($pselrun);
		$id=$fetch['InfoID'];
		$ititle=$fetch['Title'];
		$ct=$fetch['Content'];
		$author=$fetch['AdminName'];
		$image=$fetch['Image'];
 		
 	 ?>


	<tr>
		<td><img src="<?php echo $image ?>" ><br></td>

		<td>
			<table width="70%">
				
				<tr>
					<td>Post ID:</td>
					<td><?php echo $id ?><br><br></td>
				</tr>

				<tr>
					<td>Post Title:</td>
					<td><?php echo $ititle ?><br><br></td>
				</tr>


				<tr>
					<td>Content:</td>
					<td><?php echo  $ct ?><br><br></td>
				</tr>

				<tr>
					<td>Author:</td>
					<td><?php echo $author ?><br><br></td>
				</tr>

				
				<tr>
					<td colspan="2"><a href="postupdate.php?IID=<?php echo $id ?>"><input type="button" value="Update" class="button"></a></td>
				</tr>

				<tr>
					<td colspan="2"><a href="postdelete.php?IID=<?php echo $id ?>"><input type="button" value="Delete" class="button"></a></td>
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