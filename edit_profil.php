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

<!-- main -->

<div class="main">
<div class="container">
  <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <a href="profil.php" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-chevron-left"></i>Go Back to albums</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Change Your Profil</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="edit_profil.php">
            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control input-sm" value="<?php echo $_SESSION["username"]; ?>" placeholder="<?php echo $_SESSION["username"]; ?>" required>
            </div>

            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="firstname" id="firstname" class="form-control input-sm" value="<?php echo $_SESSION["firstname"]; ?>" placeholder="<?php echo $_SESSION["firstname"]; ?>" required>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="lastname" id="lastname" class="form-control input-sm" value="<?php echo $_SESSION["lastname"]; ?>" placeholder="<?php echo $_SESSION["lastname"]; ?>" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control input-sm" value="<?php echo $_SESSION["email"]; ?>" placeholder="<?php echo $_SESSION["email"]; ?>" required>
            </div>

            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm"placeholder="Confirm Password" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input type="text" name="credit_card" id="credit_card" class="form-control input-sm" value="<?php echo $_SESSION["card"]; ?>" placeholder="<?php echo $_SESSION["card"]; ?>" required>
            </div>

            <div class="form-group">
              <input type="text" name="address" id="address" class="form-control input-sm" value="<?php echo $_SESSION["address"]; ?>" placeholder="<?php echo $_SESSION["address"]; ?>" required>
            </div>
                
            <input type="submit" value="Edit" class="btn btn-info btn-block">
              
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div><!-- end of main -->

<?php  
include("mysqli_connect.php");
if (isset($_REQUEST["password"]) && $_REQUEST["password"]==$_REQUEST["password_confirmation"] ) {
  $u_id        = $_SESSION["cust_id"];
  $u_uname     = $_REQUEST["username"];
  $u_pass      = $_REQUEST["password"];
  $u_pass_con  = $_REQUEST["password_confirmation"];
  $u_firstname = $_REQUEST["firstname"];
  $u_lastname  = $_REQUEST["lastname"];
  $u_email     = $_REQUEST["email"];
  $u_card      = $_REQUEST["credit_card"];
  $u_address   = $_REQUEST["address"];

  $edit = "UPDATE customers SET cust_username='$u_uname' ,cust_password='$u_pass' ,cust_firstname='$u_firstname' ,cust_lastname='$u_lastname' ,cust_email='$u_email' ,cust_card='$u_card' ,cust_address='$u_address' WHERE cust_id='$u_id'";

  $r=mysqli_query($con, $edit);
  if ($r){
    $_SESSION["username"]=$u_uname;
    $_SESSION["password"]=$u_pass;
    $_SESSION["firstname"]=$u_firstname;
    $_SESSION["lastname"]=$u_lastname;
    $_SESSION["email"]=$u_email;
    $_SESSION["card"]=$u_card;
    $_SESSION["address"]=$u_address;
    //Success update
    header("location: profil.php");
  }
  else {
    echo "kapoio la8ws egine";
  }


}


?>



<center>
<!-- footer -->
<?php 
  include("footer.php");
?>



</body>
</html>            