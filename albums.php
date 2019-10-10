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
<a href="create_album.php" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Insert New Album</a>


<div class="panel panel-primary ">
  <!-- Default panel contents -->
  <div class="panel-heading"><center>All Current Albums</center></div>
  <div class="table-responsive table-col-to-row">
    <table class="table table-hover table-bordered" ><!-- Table -->
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Artist</th>
          <th scope="col">Stock</th>
          <th scope="col">Value (€)</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
<?php 
  include("mysqli_connect.php");

  $q="SELECT * FROM cd";
  $r=mysqli_query($con,$q);
  $n=mysqli_num_rows($r);//number of custmers
  if($n>0){
    for ($i=0; $i<$n ; $i++) { 
      $rec=mysqli_fetch_array($r);
      $_SESSION["selected"]=$rec["cd_title"]; ?>
      <tr>
        <td data-label="Title"><img class="product-thumb" src="<?php echo $rec['cd_icon_path']; ?>"  alt="..." /><?php echo $rec["cd_title"]; ?></td>
        <td data-label="Artist"><?php echo $rec["cd_artists"]; ?></td>
        <td data-label="Stock"><?php echo $rec["cd_stock"]; ?></td>
        <td data-label="Value"><?php echo $rec["cd_value"]; ?></td>
        <td data-label="Action">
          <form method="post" action="view_album.php">
            <input type="hidden" name="cd_id" value="<?php echo $rec["cd_id"]; ?>">
            <button type="submit" class="btn btn-sm btn-info" >View Album</button>
          </form>
        </td>
      </tr> 
      <?php 
    }
    
  }

?>      
        
      </tbody>
    </table><!-- end of table -->
  </div>
</div>
</div>

<!-- end of main -->
<!-- footer -->
<?php include("footer.php");?>

</body>
</html> 