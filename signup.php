<!DOCTYPE html>
<html lang="en">
<head>


<?php include("header.php") ?>


<body>

<?php 
  include("navbar.php");
?>
<!-- main -->
<div class="container">
  <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Please sign up to CopyLeftStores <small>It's free!</small></h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="egrafh.php">
            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username" required>
            </div>

            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="firstname" id="firstname" class="form-control input-sm" placeholder="First Name" required>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="lastname" id="lastname" class="form-control input-sm" placeholder="Last Name" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required>
            </div>

            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input type="text" name="credit_card" id="credit_card" class="form-control input-sm" placeholder="Credit Card" required>
            </div>

            <div class="form-group">
              <input type="text" name="address" id="address" class="form-control input-sm" placeholder="Address" required>
            </div>
                
            <input type="submit" value="Register" class="btn btn-info btn-block">
              
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end of main -->

<!-- footer -->
<?php 
  include("footer.php");
?>


</body>
</html>  
<?php 

?>