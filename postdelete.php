<?php 
include('Connect.php');

$InfoId=$_REQUEST['IID'];
$idelete="Delete from information where InfoID='$InfoId'";
$idelrun=mysqli_query($connect,$idelete);
if ($idelrun) 
{
	echo "<script>window.alert('Deleted successful')</script>";
}

else 
	{
		echo "<script>window.alert('Something went wrong')</script>";

	}

 ?>