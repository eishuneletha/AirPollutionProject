<?php  
session_start();
session_destroy();

echo "<script>window.alert('Logout successful')</script>";
echo "<script>window.location='UserRegister.php'</script>";

?>