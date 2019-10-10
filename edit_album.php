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
      <a href="albums.php" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-chevron-left"></i>Go Back to albums</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Edit this Album</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="edit_album.php">
            <div class="form-group">
              <input type="text" name="title" id="title" class="form-control input-sm" value="<?php echo $_SESSION["cd_title"]; ?>" placeholder="<?php echo $_SESSION["cd_title"]; ?>" required>
            </div>
            <div class="form-group">
              <input type="text" name="artists" id="artists" class="form-control input-sm" value="<?php echo $_SESSION["cd_artists"]; ?>" placeholder="<?php echo $_SESSION["cd_artists"]; ?>" required>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="studio" id="studio" class="form-control input-sm" value="<?php echo $_SESSION["cd_studio"]; ?>" placeholder="<?php echo $_SESSION["cd_studio"]; ?>" required>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="number" name="date" id="date" class="form-control input-sm" value="<?php echo $_SESSION["cd_date"]; ?>" placeholder="<?php echo $_SESSION["cd_date"]; ?>" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <textarea name="description" id="description" class="form-control input-sm" value="<?php echo $_SESSION["cd_description"]; ?>" placeholder="<?php echo $_SESSION["cd_description"]; ?>" required></textarea>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="number" name="value" id="value" class="form-control input-sm" value="<?php echo $_SESSION["cd_value"]; ?>" placeholder="<?php echo $_SESSION["cd_value"]; ?>" required>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="number" name="stock" id="stock" class="form-control input-sm" value="<?php echo $_SESSION["cd_stock"]; ?>" placeholder="<?php echo $_SESSION["cd_stock"]; ?>" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" name="category" id="category" class="form-control input-sm" value="<?php echo $_SESSION["cd_category"]; ?>" placeholder="<?php echo $_SESSION["cd_category"]; ?>" required>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="isbn" id="isbn" class="form-control input-sm" value="<?php echo $_SESSION["cd_isbn"]; ?>" placeholder="<?php echo $_SESSION["cd_isbn"]; ?>" required>
                </div>
              </div>
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
if (isset($_REQUEST["title"])) {
  $cd_id          = $_SESSION["cd_id"];
  $cd_title       = $_REQUEST["title"];
  $cd_artists     = $_REQUEST["artists"];
  $cd_studio      = $_REQUEST["studio"];
  $cd_date        = $_REQUEST["date"];
  $cd_description = $_REQUEST["description"];
  $cd_value       = $_REQUEST["value"];
  $cd_stock       = $_REQUEST["stock"];
  $cd_category    = $_REQUEST["category"];
  $cd_isbn        = $_REQUEST["isbn"];

  $edit = "UPDATE cd SET cd_title='$cd_title' ,cd_artists='$cd_artists' ,cd_studio='$cd_studio' ,cd_date='$cd_date' ,cd_description='$cd_description' ,cd_value='$cd_value' ,cd_stock='$cd_stock' ,cd_category='$cd_category' ,cd_isbn='$cd_isbn' WHERE cd_id='$cd_id'";

  $r=mysqli_query($con, $edit);
  if ($r){
    $_SESSION["cd_id"]=$cd_id;
    $_SESSION["cd_title"]=$cd_title;
    $_SESSION["cd_artists"]=$cd_artists;
    $_SESSION["cd_studio"]=$cd_studio;
    $_SESSION["cd_date"]=$cd_date;
    $_SESSION["cd_description"]=$cd_description;
    $_SESSION["cd_value"]=$cd_value;
    $_SESSION["cd_stock"]=$cd_stock;
    $_SESSION["cd_category"]=$cd_category;
    $_SESSION["cd_isbn"]=$cd_isbn;
    //Success update
    header("location: view_album.php"); 
  }
  else {
    echo "Something is going wrong!";
  }
  
}


?>


<!-- footer -->
<?php 
  include("footer.php");
?>

</body>
</html>            