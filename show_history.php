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

	if (isset($_REQUEST["praxh"])) {
		if ($_REQUEST["praxh"]=="add_to_cart") {
			$cd_id = $_REQUEST["cd_id"];
			$cd_value = $_REQUEST["cd_value"];
			add($cd_id,$cd_value);
      header("location: indexU.php");
		}elseif ($_REQUEST["praxh"]=="delete_from_cart") {
			$cd_id = $_REQUEST["cd_id"];
			delete_cd($cd_id);
		}elseif ($_REQUEST["praxh"]=="reset_cart") {
			$cd_id = $_REQUEST["cd_id"];
			resetCart();
		}elseif ($_REQUEST["praxh"]=="show_history") {
			$cust_id = $_REQUEST["cust_id"];
			showHistory($cust_id);
		}
	}
?>


<div class="main">
<div class="panel panel-primary ">
  <div class="panel-heading"><center> Cart History</center></div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered" ><!-- Table -->
      <thead>
        <tr>
        	<th>#</th>
          <th>Title</th>
          <th>Value (€)</th>
        </tr>
      </thead>
      <tbody>
<?php 
	
	if (empty($_SESSION["admin"])) {
		$cust_id=$_SESSION["cust_id"];
	}elseif (isset($_SESSION["cust_id"])) {
		$cust_id=$_SESSION["cust_id"];
	}else $cust_id=$_REQUEST["cust_id"];
	

  $q="SELECT * FROM cart_history WHERE cust_id='$cust_id'";
  $r=mysqli_query($con,$q);
  $n=mysqli_num_rows($r);//number of albums in cart

  if($r){
    for ($i=0; $i<$n ; $i++) {
      $rec=mysqli_fetch_array($r); ?>
      <tr>
      	<td><?php echo $i+1; ?></td>
        <td><?php echo $rec["cd_title"]; ?></td>
        <td><?php echo $rec["cd_value"]; ?></td>
      </tr> 
      
      <?php 
    }  
  }
?>      
        <tr>
      </tbody>
    </table>
  </div>
</div>
</div><!-- end of main -->


<!-- footer -->
<?php 
  include("footer.php");
?>



</body>
</html> 