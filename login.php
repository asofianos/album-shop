<?php 

  session_start();

  if($_REQUEST){
    include("mysqli_connect.php");//connect to db

  	$log_uname=$_REQUEST["username"];
  	$log_pass=$_REQUEST["password"];

  	$login_query="SELECT * FROM customers WHERE cust_username='$log_uname' AND cust_password='$log_pass'";

  	$r=mysqli_query($con, $login_query);


  	$n_rw=mysqli_num_rows($r);


  	if ($log_uname=="admin" && $log_pass=="12345" ){
  		$_SESSION["admin"] = "true";
  		$_SESSION["login"] = "true";
  		$_SESSION["username"] = $log_uname;
      header("location: indexA.php");
  	}elseif ($n_rw>0) {
      $rec=mysqli_fetch_array($r);
  		$_SESSION["login"]="true";
      $_SESSION["cust_id"]=$rec["cust_id"];
  		$_SESSION["username"]=$log_uname;
      $_SESSION["password"]=$log_pass;
      $_SESSION["firstname"]=$rec["cust_firstname"];
      $_SESSION["lastname"]=$rec["cust_lastname"];
      $_SESSION["email"]=$rec["cust_email"];
      $_SESSION["card"]=$rec["cust_card"];
      $_SESSION["address"]=$rec["cust_address"];
      header("location: indexU.php");
  	}
  	else {
      header("location: index.php");
  	}

  	//close db connection
  	mysqli_close($con);
	}

?>              		