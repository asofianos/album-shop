<?php  

	session_start();

	include("mysqli_connect.php");
	$u_id = $_SESSION["cust_id"];

	$delete_user = "DELETE FROM customers WHERE cust_id='$u_id'";
	//echo $delete_user;
	$r=mysqli_query($con, $delete_user);
	if($r){
		session_destroy();
		echo "<center style=\"color: red;\"><h2>You have delete your account successfully</h2></center>";
		echo "<center style=\"color: green;\"><h2>You have logged out successfully</h2></center>";
		header("location: index.php");
	}
	else {
      echo "kapoio la8ws egine";
  }


?>