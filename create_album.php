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
          <h3 class="panel-title">Insert New Album Here!</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="create_album.php" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" name="title" id="title" class="form-control input-sm" placeholder="Album's Title" required>
            </div>
            <div class="form-group">
              <input type="text" name="artists" id="artists" class="form-control input-sm" placeholder="Artist-Band" required>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="studio" id="studio" class="form-control input-sm" placeholder="Studio" required>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="number" name="date" id="date" class="form-control input-sm" placeholder="Published date" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <textarea name="description" id="description" class="form-control input-sm" placeholder="Description" required></textarea>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="number" name="value" id="value" class="form-control input-sm" placeholder="Value $$$" required>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="number" name="stock" id="stock" class="form-control input-sm" placeholder="In Stock" required>
                </div>
              </div>
            </div>
              
            <div class="form-group">
              <input type="text" name="category" id="category" class="form-control input-sm" placeholder="Category" required>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="isbn" id="isbn" class="form-control input-sm" placeholder="isbn code" required>
                </div>
              </div>
            </div>

            <div class="form-group"><!-- upload files -->
              Select image to upload:
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
                
            <input type="submit" value="Create" class="btn btn-info btn-block">
              
          </form>
        </div>
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

<?php  
include("mysqli_connect.php");

if (isset($_REQUEST["title"])){
  $cd_title       = $_REQUEST["title"];
  $cd_artists     = $_REQUEST["artists"];
  $cd_studio      = $_REQUEST["studio"];
  $cd_date        = $_REQUEST["date"];
  $cd_description = $_REQUEST["description"];
  $cd_value       = $_REQUEST["value"];
  $cd_stock       = $_REQUEST["stock"];
  $cd_category    = $_REQUEST["category"];
  $cd_isbn        = $_REQUEST["isbn"];


  $target_dir = "images_upload/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 700000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          $cd_icon_path ="./images_upload/".basename( $_FILES["fileToUpload"]["name"]);
          //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }


  $create_cd="INSERT INTO cd(cd_title ,cd_artists ,cd_date ,cd_studio ,cd_description ,cd_value ,cd_stock ,cd_icon_path ,cd_category ,cd_isbn) VALUES('$cd_title','$cd_artists','$cd_date','$cd_studio','$cd_description','$cd_value','$cd_stock','$cd_icon_path','$cd_category','$cd_isbn')";
  $r=mysqli_query($con, $create_cd);

  if ($r && isset($cd_icon_path)) {
    //Success insertion
    header("location: albums.php");
  }else {
      echo "Something is going wrong!";
  }
  
}



?>

</html> 

