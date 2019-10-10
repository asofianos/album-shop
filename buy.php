<?php

	session_start();

?>
<!DOCTYPE html>
<html lang="en">

<?php include("header.php") ?>

<body>

<?php 
  include("navbar.php");
?>


<?php  
include("mysqli_connect.php");

	function resetCart($cust_id){
		include("mysqli_connect.php");

		$reset_cart_q= "DELETE FROM new_cart WHERE cust_id='$cust_id'";

		$r=mysqli_query($con, $reset_cart_q);
		if($r){
			
			//echo "Your cart is empty";
		}
		else {
      echo "kapoio la8ws egine sto resetCart()";
  	}
	}	

	if (!isset($_SESSION["admin"])){
		$cust_id=$_SESSION["cust_id"];
		$q="SELECT * FROM new_cart WHERE cust_id='$cust_id'";
		$r=mysqli_query($con,$q);
		if ($r) {
			$n=mysqli_num_rows($r);
			$message="Succesuful order !";
			if ($n<=0) {
				$message="Cart is empty !";
			}
			for ($i=0; $i<$n ; $i++) { 
				$rec=mysqli_fetch_array($r);

				$cust_id=$_SESSION["cust_id"];
				$cd_id=$rec["cd_id"];
				$cd_title=$rec["cd_title"];
				$cd_value=$rec["cd_value"];

				$add_to_cart_history="INSERT INTO cart_history(cust_id,cd_id,cd_title,cd_value) VALUES('$cust_id','$cd_id','$cd_title','$cd_value')";
				$result=mysqli_query($con, $add_to_cart_history);
				if ($result) {
					//echo "Success";
				}else echo "Something going wrong!";
			}

			resetCart($cust_id);
			?>
			<div class="main">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10" >
						<div class="result "> 
							<?php echo $message; ?>
						</div>
					</div>
				</div>
			</div>
			</div>
		<?php
		} 
	}
?>

<!-- footer -->
<?php 
  include("footer.php");
?>


</body>
</html> 