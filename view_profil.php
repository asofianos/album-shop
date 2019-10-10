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
include("mysqli_connect.php");//connect to db

$u_id=$_REQUEST["u_id"];
$_SESSION["u_id"]=$u_id;
echo $u_id;
$q="SELECT * FROM customers WHERE cust_id=$u_id";
$r=mysqli_query($con,$q);
if($r) {
  $rec=mysqli_fetch_array($r);
  $u_id        = $rec["cust_id"];
  $u_uname     = $rec["cust_username"];
  $u_pass      = $rec["cust_password"];
  $u_firstname = $rec["cust_firstname"];
  $u_lastname  = $rec["cust_lastname"];
  $u_email     = $rec["cust_email"];
  $u_card      = $rec["cust_card"];
  $u_address   = $rec["cust_address"];
  
}

?>

<!-- main -->
<div class="main">
<div class="container">
  <div class="row">
    <div class="col-md-5 pull-left col-md-offset-3 ">
      <a href="customers.php" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-chevron-left"></i>Go Back to customers</a>
      <p class=" text-info">May 05,2014,03:00 pm </p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 " >
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Customer</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="./images/customer.png" class="img-circle img-responsive"> </div>
            
            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Username:</td>
                    <td><?php echo $u_uname; ?></td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                    <td><?php echo $u_pass; ?></td>
                  </tr>
                  <tr>
                    <td>Firstname:</td>
                    <td><?php echo $u_firstname; ?></td>
                  </tr>
                  <tr>
                    <td>Lastname:</td>
                    <td><?php echo $u_lastname; ?></td>
                  </tr>
               
                  <tr>
                    <tr>
                      <td>Email:</td>
                      <td><a href="<?php echo $u_email; ?>"><?php echo $u_email; ?></a></td>
                    </tr>
                    <tr>
                      <td>Home Address:</td>
                      <td><?php echo $u_address; ?></td>
                    </tr>
                    <tr>
                      <td>Credir Card:</td>
                      <td><?php echo $u_card; ?></td>
                    </tr>
                      <td>Phone Number</td>
                      <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                    </td>
                       
                  </tr>
                 
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
          <div class="panel-footer">
            <form method="post" action="show_history.php">
              <input type="hidden" name="cust_id" value="<?php echo $u_id; ?>">
              <button type="submit" class="btn btn-sm btn-warning btn-block">Cart history<span class="glyphicon glyphicon-shopping-cart"></span></button>
            </form>
            <form method="post" action="delete_customer.php">
              <input type="hidden" name="u_id" value="<?php echo $u_id; ?>">
              <button type="submit" class="btn btn-sm btn-danger btn-block" >Delete <span class="glyphicon glyphicon-trash"></span></button>
              </form>   
          </div>
      </div>
    </div>
  </div>
</div>
</div><!-- end of main -->

<!-- footer -->
<?php 
  include("footer.php");
?>



</body>
</html>            