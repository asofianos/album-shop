<?php  

	session_start();

	include("mysqli_connect.php");
	$cd_id=$_REQUEST["cd_id"];

	$delete_album = "DELETE FROM cd WHERE cd_id='$cd_id'";
	echo $delete_album;
	$r=mysqli_query($con, $delete_album);
	if($r){

		header("location: albums.php");
	}
	else {
      echo "kapoio la8ws egine";
  }


?>