<?php  

	session_start();

	include("mysqli_connect.php");
	$u_id = $_REQUEST["u_id"];

	$delete_user = "DELETE FROM customers WHERE cust_id='$u_id'";
	echo $delete_user;
	$r=mysqli_query($con, $delete_user);
	if($r){
		header("location: customers.php");
	}
	else {
      echo "kapoio la8ws egine";
  }

?>