<?php 
	include('connect.php');

	if (isset($_REQUEST['HID'])) 
	{
		$HistoryID=$_REQUEST['HID'];
		$hdel="Delete from history where HistoryID='$HistoryID'";
		$delrun=mysqli_query($connect,$hdel);

		if ($delrun) 
		{
			echo "<script>window.alert('History deleted successfully!')</script>";
			echo "<script>window.location='History.php'</script>";
		}

		else
		{
			echo "<script>window.alert('Something went wrong')</script>";
		}
	}

	if (isset($_REQUEST['delall'])) 
	{
		$UserID=$_REQUEST['txtuid'];
		$del="Delete from history where UserID='$UserID'";
		$run=mysqli_query($connect,$del);

		if ($run) 
		{
			echo "<script>window.alert('All of your history is deleted successfully!')</script>";
			echo "<script>window.location='History.php'</script>";
		}

		else
		{
			echo "<script>window.alert('Something went wrong')</script>";
		}
	}
 ?>