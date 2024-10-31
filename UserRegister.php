<?php  
include('Connect.php');


if (isset($_REQUEST['enter'])) 
{
	$uname=$_REQUEST['uname'];
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$hashedpassword=md5($password);
	$dob=$_REQUEST['date'];
	$address=$_REQUEST['address'];
  $post=$_REQUEST['post'];

  // $pp=$_FILES['pp']['name'];
  // $folder="Images/";

  // if ($pp) 
  // {
  //     $new=$folder.$pp;
  //     $copy=copy($_FILES['pp']['tmp_name'],$new);

  //     if (!$copy) 
  //     {
  //       echo "<script>Something went wrong</script>";
  //     }
  // }


	$check="Select * from users where Email='$email'";
	$checkrun=mysqli_query($connect, $check);
	$count=mysqli_num_rows($checkrun);

	if ($count==0) 
	{
		$insert="Insert into users (UserName,FirstName,LastName,Email,Password,DateOfBirth,Address,PostCode) values ('$uname','$fname','$lname','$email','$hashedpassword','$dob','$address','$post')";
		$irun=mysqli_query($connect,$insert);

		if ($irun) 
		{
			echo "<script>window.alert('Register successful')</script>";
		}

		else
		{
			echo "<script>window.alert('Something went wrong')</script>";
			echo mysqli_error($connect);
		}
	}

	else
	{
		echo "<script>window.alert('Email already exist')</script>";
	}
 
	
}


?>

<html>
<head>
	<title>UserRegister</title>
 <link rel="stylesheet" type="text/css" href="Style.css">
 <meta name="viewport" content="width=device-width, intial-scale=1.0">
 <script src="https://kit.fontawesome.com/c8fd1d96f9.js" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

</head>
<body class="wall">
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

              <a href="UserRegister.php"><span><i class="fas fa-cash-register"></i> Register</span></a>
              <a href="UserLogin.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
             
              <a href="ContactUs.php"><i class="fas fa-smile"></i> Contact Us</a>
              <a href="MyQuestions.php">My Questions</a>
              <a href="FaqDisplay.php">FAQ</a>
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





<form method="post" action="" class="form" >
<table class="table">
  <tr>
    <th colspan="2">Register Here</th>
  </tr>


<tr>
  <td> User <i class="fas fa-user"></i> :</td>
   <td><input class="input" type="text" name="uname" placeholder="Enter User Name Here" required></td>
</tr>
 
  <tr>
    <td>First Name:</td>
    <td><input class="input" type="text" name="fname" required></td>
  </tr> 


  <tr>
    <td>Last Name:</td>
    <td><input class="input"  type="text" name="lname" required></td>
  </tr>

  <tr>
    <td>Email <i class="fas fa-envelope"></i> :</td>
    <td><input class="input" type="text" name="email" required></td>
  </tr>

  <br>

  <tr>
    <td>Password <i class="fas fa-key"></i> :</td>
    <td><input class="input" type="password" name="password" required></td>
  </tr>

  <tr>
    <td>Date of Birth <i class="fas fa-calendar-alt"></i> :</td>
    <td><input class="input" type="date" name="date" required></td>
  </tr>

  <tr>
    <td>Address <i class="fas fa-house-user"></i> :</td>
    <td><input class="input" type="text" name="address" required></td>
  </tr>

  <tr>
    <td>Post Code <i class="fas fa-mail-bulk"></i> :</td>
    <td><input class="input" type="text" onkeypress="isInputNumber(event)" name="post" placeholder="Only digits allowed" required></td>
  </tr>

  <script type="text/javascript">
    function isInputNumber(evt)
    {
      var ch=String.fromCharCode(evt.which);

      if (!(/[0-9]/.test(ch))) 
      {
        evt.preventDefault(); 
      };
    }

  </script>
 
  <tr>
    <td colspan="2"><button type="submit" name="enter" value="Register" class="button">Register</td>
  </tr>

  <tr>
    <td colspan="2"><p>Already have an account? Login Now for free!</p></td>
    
  </tr>

  <tr>
     <td colspan="2"><a href="UserLogin.php"><button class="button">Login</a></td>
  </tr>
 
 </table>
      </form> 

</body>

<footer >
  <p>CopyRight&copy;www.airpollution.com All Right Reserved | Privacy and terms of use | <a href="#"><i class="fas fa-at"></i> Email us</a></p>

</footer>
</html>