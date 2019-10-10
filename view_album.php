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

$cd_id=$_REQUEST["cd_id"];
$_SESSION["cd_id"]=$cd_id;
$q="SELECT * FROM cd WHERE cd_id=$cd_id";
$r=mysqli_query($con,$q);
if($r) {
  $rec=mysqli_fetch_array($r);
  $cd_title       = $rec["cd_title"];
  $cd_artists     = $rec["cd_artists"];
  $cd_studio      = $rec["cd_studio"];
  $cd_date        = $rec["cd_date"];
  $cd_description = $rec["cd_description"];
  $cd_value       = $rec["cd_value"];
  $cd_stock       = $rec["cd_stock"];
  $cd_icon_path   = $rec["cd_icon_path"];
  $cd_category    = $rec["cd_category"];
  $cd_isbn        = $rec["cd_isbn"];

  $_SESSION["cd_id"]=$cd_id;
  $_SESSION["cd_title"]=$cd_title;
  $_SESSION["cd_artists"]=$cd_artists;
  $_SESSION["cd_studio"]=$cd_studio;
  $_SESSION["cd_date"]=$cd_date;
  $_SESSION["cd_description"]=$cd_description;
  $_SESSION["cd_value"]=$cd_value;
  $_SESSION["cd_stock"]=$cd_stock;
  $_SESSION["cd_icon_path"]=$cd_icon_path;
  $_SESSION["cd_category"]=$cd_category;
  $_SESSION["cd_isbn"]=$cd_isbn;
}

?>

<!-- main -->
<div class="main">
<div class="container">
  <div class="row">
    <div class="col-md-5 pull-left col-md-offset-3 "><?php if(isset($_SESSION["admin"])) { ?>
      <a href="albums.php" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-chevron-left"></i>Go Back to albums</a>
      <?php } ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 " >
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Album</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> <img alt="Album Pic" src="<?php echo $rec["cd_icon_path"]; ?>" class="img-responsive"> </div>
            
            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Title:</td>
                    <td><?php echo $cd_title; ?></td>
                  </tr>
                  <tr>
                    <td>Artist-Band:</td>
                    <td><?php echo $cd_artists; ?></td>
                  </tr>
                  <tr>
                    <td>Date:</td>
                    <td><?php echo $cd_date; ?></td>
                  </tr>
                  <tr>
                    <td>Studio:</td>
                    <td><?php echo $cd_studio; ?></td>
                  </tr>
                  <tr>
                    <td>Description:</td>
                    <td><?php echo $cd_description; ?></td>
                  </tr>
                  <tr>
                    <td>Value:</td>
                    <td><?php echo $cd_value; ?></td>
                  </tr>
                  <tr><?php if(isset($_SESSION["admin"])) { ?>
                    <td>Stock:</td>
                    <td><?php echo $cd_stock; ?></td>
                  </tr>
                  <tr>
                    <td>Image name:</td>
                    <td><?php echo $cd_icon_path; ?></td>
                  </tr><?php } ?>
                  <tr>
                    <td>Category:</td>
                    <td><?php echo $cd_category; ?></td>     
                  </tr>
                  <tr>
                    <td>ISBN:</td>
                    <td><?php echo $cd_isbn; ?></td>     
                  </tr>
                 
                </tbody>
              </table>
              
            </div>
          </div>
        </div><?php if(isset($_SESSION["admin"])) { ?>
          <div class="panel-footer">
            <a href="edit_album.php" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i>Edit this album</a>
            <span class="pull-right">
              <form method="post" action="delete_album.php">
                <input type="hidden" name="cd_id" value="<?php echo $rec["cd_id"]; ?>">
                <button type="submit" class="btn btn-sm btn-danger" >Delete <span class="glyphicon glyphicon-trash"></span></button>
              </form>
            </span>
        </div>
        <?php }elseif (isset($_SESSION["username"])) {?>
        <div class="panel-footer">
              <form method="post" action="cart.php">
                <input type="hidden" name="cd_id" value="<?php echo $rec["cd_id"]; ?>">
                <input type="hidden" name="cd_value" value="<?php echo $rec["cd_value"]; ?>">
                <input type="hidden" name="cd_title" value="<?php echo $rec["cd_title"]; ?>">
                <input type="hidden" name="praxh" value="add_to_cart">
                <button type="submit" class="btn btn-sm btn-primary btn-block" >To Cart <span class="glyphicon glyphicon-shopping-cart"></span></button>
              </form>
        </div>
        <?php } ?>
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