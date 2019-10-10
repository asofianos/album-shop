<?php 
  session_start();

  include("mysqli_connect.php");//connect to db
  
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
<div class="row">
<div class="panel panel-primary ">
  <div class="panel-heading"><center>All Current Customers</center></div>
  <div class="table-responsive table-col-to-row">
    <table class="table table-hover table-bordered" ><!-- Table -->
      <thead>
        <tr>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
<?php 
  $q="SELECT * FROM customers";
  $r=mysqli_query($con,$q);
  $n=mysqli_num_rows($r);//number of custmers

  if($n>0){
    for ($i=0; $i<$n ; $i++) { 
      $rec=mysqli_fetch_array($r);
      $_SESSION["selected"]=$rec["cust_username"]; ?>
      <tr>
        <td data-label="Firstname"><?php echo $rec["cust_firstname"]; ?></td>
        <td data-label="Lastname"><?php echo $rec["cust_lastname"]; ?></td>
        <td data-label="Email"><?php echo $rec["cust_email"]; ?></td>
        <td data-label="Action">
          <form method="post" action="view_profil.php">
            <input type="hidden" name="u_id" value="<?php echo $rec["cust_id"]; ?>">
            <button type="submit" class="btn btn-sm btn-info" >View Profil <span class="glyphicon glyphicon-user"></span></button>
          </form>
        </td>
      </tr> 
      <?php 
    }
    
  }

?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div><!-- end of main -->


<?php 
  include("footer.php");
?>


</body>
</html> 