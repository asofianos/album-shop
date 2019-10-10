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
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
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
                    <td><?php echo $_SESSION["username"]; ?></td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                    <td><?php echo $_SESSION["password"]; ?></td>
                  </tr>
                  <tr>
                    <td>Firstname:</td>
                    <td><?php echo $_SESSION["firstname"]; ?></td>
                  </tr>
                  <tr>
                    <td>Lastname:</td>
                    <td><?php echo $_SESSION["lastname"]; ?></td>
                  </tr>
               
                  <tr>
                    <tr>
                      <td>Email:</td>
                      <td><a href="<?php echo $_SESSION["email"]; ?>"><?php echo $_SESSION["email"]; ?></a></td>
                    </tr>
                    <tr>
                      <td>Home Address:</td>
                      <td><?php echo $_SESSION["address"]; ?></td>
                    </tr>
                    <tr>
                      <td>Credir Card:</td>
                      <td><?php echo $_SESSION["card"]; ?></td>
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
            <a href="edit_profil.php" type="button" class="btn btn-sm btn-warning">Edit <i class="glyphicon glyphicon-edit"></i></a>
            <span class="pull-right">
              <a href="delete_profil.php" type="button" class="btn btn-sm btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></a>
            </span>
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