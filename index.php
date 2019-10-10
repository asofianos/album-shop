<?php 

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
<?php 
//connect to db 
include("mysqli_connect.php");
$length=0;

$query="SELECT * FROM cd";

$r=mysqli_query($con, $query);
$length=mysqli_num_rows($r);
for($i=0; $i < $length; $i++){
  $rec=mysqli_fetch_array($r); 

  ?>
    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2"><!-- grid -->
      <div class="thumbnail">
        
        <img src="<?php echo $rec["cd_icon_path"]; ?>"  alt="...">
        <div class="caption">
          <h4><?php echo $rec["cd_title"]; ?></h4>
          <small>By: <?php echo $rec["cd_artists"]; ?></small>
          <p id="price">Only <?php echo $rec["cd_value"];?>€</p>
          <span>
            <form method="post" action="cart.php">
              <input type="hidden" name="cd_id" value="<?php echo $rec["cd_id"]; ?>">
              <input type="hidden" name="cd_value" value="<?php echo $rec["cd_value"]; ?>">
              <input type="hidden" name="cd_title" value="<?php echo $rec["cd_title"]; ?>">
              <input type="hidden" name="praxh" value="add_to_cart">
              <button type="submit" class="btn btn-sm btn-primary btn-block" >To Cart <span class="glyphicon glyphicon-shopping-cart"></span></button>
            </form>
          </span>
          <span>
            <form method="post" action="view_album.php">
              <input type="hidden" name="cd_id" value="<?php echo $rec["cd_id"]; ?>">
              <button type="submit" class="btn btn-sm btn-block btn-info" >See More...</button>
            </form>
          </span>
        </div>
      </div>
    </div>
  <?php 
}

?>
</div>

<!-- end of main -->


<!-- footer -->
<?php 
  include("footer.php");
?>

</body>
</html>  
            		