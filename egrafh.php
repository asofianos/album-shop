<?php 

	session_start();		

	//connect to db
	include("mysqli_connect.php");

	//customer
	$u_uname     = $_REQUEST["username"];
	$u_pass      = $_REQUEST["password"];
	$u_pass_con  = $_REQUEST["password_confirmation"];
	$u_firstname = $_REQUEST["firstname"];
	$u_lastname  = $_REQUEST["lastname"];
	$u_email     = $_REQUEST["email"];
	$u_card      = $_REQUEST["credit_card"];
	$u_address   = $_REQUEST["address"];

	$exist_u_query = "SELECT * FROM customers WHERE cust_username='$u_uname'";
	$rw=mysqli_query($con, $exist_u_query);
	$n_rw=mysqli_num_rows($rw);
	if ($n_rw>0 || $u_pass!=$u_pass_con) {
		header("location: signup.php");
	}
	else{

		$q="SELECT * FROM customers";//all customers
		$r=mysqli_query($con, $q);
		$n_r=mysqli_num_rows($r);

		$create_u_query="INSERT INTO customers(cust_username,cust_password,cust_firstname,cust_lastname,cust_email,cust_card,cust_address) VALUES('$u_uname','$u_pass','$u_firstname','$u_lastname','$u_email','$u_card','$u_address')";
		$new_customer=mysqli_query($con, $create_u_query);
		if ($new_customer){
			header("location: index.php");
		}else {
			echo "kapoio la8ws egine";
		}
	}
		

	//close db connection
	mysqli_close($con);

?>