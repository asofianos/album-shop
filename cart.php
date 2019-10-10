<?php

	session_start();

if(!isset($_SESSION["username"])){

	header("location: index.php");
}else{



	include("mysqli_connect.php");

	function add($cd_id,$cd_value){
		//connect to db	
		include("mysqli_connect.php");
		$cd_title=$_REQUEST["cd_title"];

		$cust_id=$_SESSION["cust_id"];

		$add_to_cart="INSERT INTO new_cart (cust_id,cd_id,cd_title,cd_value) VALUES ('$cust_id','$cd_id','$cd_title','$cd_value')";
		
		$add_query_result = mysqli_query($con, $add_to_cart);
		$count = mysqli_num_rows($search_result);
		if ($add_query_result == TRUE) {
			header("location: indexU.php");
		} else if ($add_query_result == FAlSE) {
			echo "einai false kapoio la8os egine me to add()";
		}
		
	}

	function ShowCost($cust_id) {
		include("mysqli_connect.php");

		$cost=0;
		$query="SELECT SUM(cd_value) FROM new_cart WHERE cust_id='$cust_id'";
		$r_q=mysqli_query($con, $query);
		$n=mysqli_num_rows($r_q);
		
		if ($r_q) {
			$rec=mysqli_fetch_array($r_q);	
			$cost = $rec['SUM(cd_value)'];
		}
		return $cost;
	}
	
	function delete_cd($cd_id) {
		include("mysqli_connect.php");

		$cust_id=$_SESSION["cust_id"];
		$delete_from_cart_q= "DELETE FROM new_cart WHERE cd_id='$cd_id' and cust_id='$cust_id' LIMIT 1";//LIMIT 1 delete only one product in the db

		$r=mysqli_query($con, $delete_from_cart_q);
		if($r){
			//echo "Success";
		}
		else {
      echo "Something is goning wrong!";
  	}
	}

	function showHistory($cust_id){

		?>
		<div class="main">
		<div class="panel panel-primary">
		  <div class="panel-heading"><center>All Albums in Cart </center></div>
		  <div class="table-responsive">
		    <table class="table table-hover table-bordered" ><!-- Table -->
		      <thead>
		        <tr>
		        	<th>#</th>
		          <th>Title</th>
		          <th>Value (€)</th><?php if (!isset($_SESSION["admin"])) { ?>
		          <th>Action</th> <?php } ?>
		        </tr>
		      </thead>
		      <tbody>
		<?php 

		$query="SELECT * FROM cart_history WHERE cust_id='$cust_id'";
		$r_q=mysqli_query($con, $query);
		if ($r_q) {
			$n=mysqli_num_rows($r_q);
			for ($i=0; $i <$n ; $i++) { 
				$rec=mysqli_fetch_array($r_q);
				
			}
			
		}

	}

	function resetCart($cust_id){
		include("mysqli_connect.php");
		$cust_id=$_SESSION["cust_id"];

		$delete_from_cart_q= "DELETE FROM new_cart WHERE cust_id='$cust_id'";//LIMIT 1 diagrafei ena record mono
		$r=mysqli_query($con,$delete_from_cart_q);
		header("location: cart.php");
	}


	
}




	if (isset($_REQUEST["praxh"])) {

		if ($_REQUEST["praxh"]=="add_to_cart") {
			$cd_id = $_REQUEST["cd_id"];
			$cd_value = $_REQUEST["cd_value"];
			add($cd_id,$cd_value);
			
			
		}elseif ($_REQUEST["praxh"]=="delete_from_cart") {
			$cd_id = $_REQUEST["cd_id"];
			delete_cd($cd_id);
		}elseif ($_REQUEST["praxh"]=="reset_cart") {
			$cust_id = $_SESSION["cust_id"];
			resetCart($cust_id);
		}elseif ($_REQUEST["praxh"]=="show_history") {
			$cust_id = $_REQUEST["cust_id"];
			showHistory($cust_id);
		}
	}

?>
<!DOCTYPE html>
<html lang="en">


<?php include("header.php") ?>

<body>

<?php 
  include("navbar.php");
?>

<div class="main">
<div class="panel panel-primary ">
  <div class="panel-heading"><center>All Albums in Cart </center></div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered" ><!-- Table -->
      <thead>
        <tr>
        	<th>#</th>
          <th>Title</th>
          <th>Value (€)</th><?php if (!isset($_SESSION["admin"])) { ?>
          <th>Action</th> <?php } ?>
        </tr>
      </thead>
      <tbody>
<?php 
	
	if (empty($_SESSION["admin"])) {
		$cust_id=$_SESSION["cust_id"];
	}elseif (isset($_SESSION["cust_id"])) {
		$cust_id=$_SESSION["cust_id"];
	}else $cust_id=$_REQUEST["cust_id"];
	


  $q="SELECT * FROM new_cart WHERE cust_id='$cust_id'";
  $r=mysqli_query($con,$q);
  $n=mysqli_num_rows($r);//number of albums in cart

//---------------------------------------------------------------------------------------------
  if($r){
    for ($i=0; $i<$n ; $i++) {
      $rec=mysqli_fetch_array($r); ?>
      <tr>
      	<td><?php echo $i+1; ?></td>
        <td><?php echo $rec["cd_title"]; ?></td>
        <td><?php echo $rec["cd_value"]; ?></td><?php if (!isset($_SESSION["admin"])) { ?>
        <td>
          <form method="post" action="cart.php">
            <input type="hidden" name="cd_id" value="<?php echo $rec["cd_id"]; ?>">
            <input type="hidden" name="praxh" value="delete_from_cart">
            <button type="submit" value="delete" class="btn btn-sm btn-danger" >Delete <span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td><?php } ?>
      </tr> 
      
      <?php 
    }  
  }
?>      
      </tbody>
    </table>
    <p>Cost with VAT :<?php echo ShowCost($cust_id)."€"; ?></p>
    <form method="post" action="cart.php">
      <input type="hidden" name="cd_id" value="<?php echo $rec["cd_id"]; ?>">
      <input type="hidden" name="praxh" value="reset_cart">
      <input type="submit" value="Reset Cart" class="btn btn-sm btn-primary" >
    </form>
    <form method="post" action="buy.php">
      <input type="submit" value="Buy" class="btn btn-sm btn-success" >
    </form>
  </div>
</div>
</div><!-- end of main -->



<!-- footer -->
<?php 
  include("footer.php");
?>



</body>
</html> 