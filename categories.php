<?php  
  session_start();

  include("mysqli_connect.php");
$min = 0;
$max = 50;

//cat%5B%5D=rock is like cat[]=rock 
// %20 is space
// %5B is '['
// and %5D is ']'


if (isset($_GET['cat'])) {
  for ($i=0; $i < $l; $i++) { 
    $cat_array[$i]=$_GET['cat'][$i];

  }
}

if (! empty($_GET['min_price'])) {
    $min = $_GET['min_price'];
}

if (! empty($_GET['max_price'])) {
    $max = $_GET['max_price'];
}

if (isset($_GET["year"])) {

  if ($_GET["year"]=="60s") {
    $min_year=1960;
    $max_year=1969;
  }elseif ($_GET["year"]=="70s") {
    $min_year=1970;
    $max_year=1979;
  }elseif ($_GET["year"]=="80s") {
    $min_year=1980;
    $max_year=1989;
  }elseif ($_GET["year"]=="90s") {
    $min_year=1990;
    $max_year=1999;
  }elseif ($_GET["year"]=="00s") {
    $min_year=2000;
    $max_year=2009;
  }else {
    $min_year=2010;
    $max_year=2019;
  }

}


?>
<!DOCTYPE html>
<html lang="en">


<?php include("header.php") ?>

<body>

<?php 
  include("navbar.php");
  
  $num_tags_array = array();
  $query="SELECT MAX(cd_category), COUNT(cd_id) FROM cd group by cd_category";
  $search_result=mysqli_query($con, $query);
  $count = mysqli_num_rows($search_result);

  while ($row = mysqli_fetch_array($search_result)) {
    $acat=$row["MAX(cd_category)"];// category ->rock
    $anum=$row["COUNT(cd_id)"];//all rock albums in db-> 20
    $num_tags_array[$acat] = $anum;// $num_tags_array['rock'] = 20;
  }

?>


<div class="main">
<div class="container">
<div class="row">


<aside class="col-sm-3 col-md-3">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>Search by Categories</h4>
    </div>
    <div class="panel-body">
      
      <div class="card">
        <form method="get" action="categories.php">
        <div class="form-group">
          <label>Find - Quick Search</label>
          <input class="form-control input-sm @cell" name="search" placeholder="Album,Band,Song..." type="text">
        </div>
        <div class="form-group">
          <label>Studios</label>
          <select class="form-control input-sm" name="studio">
            <option value="All">[All]</option>
            <option value="Abbey Road Studios">Abbey Road Studios</option>
            <option value="Atlantic">Atlantic</option>
            <option value="Big Brother Records">Big Brother Records</option>
            <option value="Britannia Row">Britannia Row</option>
            <option value="Columbia">Columbia</option>
            <option value="Creation Records">Creation Records</option>
            <option value="Decca">Decca</option>
            <option value="EMI Studios">EMI Studios</option>
            <option value="IBC Records">IBC Records</option>
            <option value="K-tel">K-tel</option>
            <option value="London Records">London Records</option>
            <option value="Polydor">Polydor</option>
            <option value="Ramport Studio">Ramport Studio</option>
            <option value="Rumbo Studios">Rumbo Studios</option>
            <option value="Stax Studios">Stax Studios</option>
            <option value="Virgin">Virgin</option>
          </select>
        </div>
        <div class="form-group">
          <label>Artists - Bands</label>
          <select class="form-control input-sm" name="artist">
            <option value="All">[All]</option>
            <option value="Bob Dylan">Bob Dylan</option>
            <option value="David Bowie">David Bowie</option>
            <option value="Guns N Roses">Guns N Roses</option>
            <option value="Led Zeppelin">Led Zeppelin</option>
            <option value="Oasis">Oasis</option>
            <option value="Pink Floyd">Pink Floyd</option>
            <option value="Slade">Slade</option>
            <option value="The Beattles">The Beattles</option>
            <option value="The Kinkss">The Kinks</option>
            <option value="The Rolling Stones">The Rolling Stones</option>
            <option value="The Who">The Who</option>
            <option value="Willie Dixon">Willie Dixon</option>
          </select>
        </div>
        <article class="card-group-item">
          <header class="card-header"><h6 class="title">Similar category </h6></header>
          <div class="filter-content">
            <div class="card-body">
              <div class="custom-control custom-checkbox">
                <?php  
                  if (isset($_GET['cat'])&& in_array('rock', $_GET['cat'])) { ?>
                    <label class="custom-control-label" for="Check1"><input type="checkbox" class="custom-control-input" name="cat[]" value="rock" onclick="this.form.submit()" checked="on" id="cat"> Rock</label>
                    <?php 
                  }else { ?>
                    <label class="custom-control-label" for="Check1"><input type="checkbox" class="custom-control-input" name="cat[]" value="rock" onclick="this.form.submit()" id="cat"> Rock</label>
                    <?php
                  }
                ?>
                <span class="float-right badge badge-light round"> <?php echo $num_tags_array['rock'] ?></span>
              </div> <!-- form-check.// -->

              <div class="custom-control custom-checkbox">
                <?php  
                  if (isset($_GET['cat'])&& in_array('blues', $_GET['cat'])) { ?>
                    <input type="checkbox" class="custom-control-input" name="cat[]" value="blues" onclick="this.form.submit()" checked="on" id="cat">
                    <?php 
                  }else { ?>
                    <input type="checkbox" class="custom-control-input" name="cat[]" value="blues" onclick="this.form.submit()" id="cat">
                    <?php
                  }
                ?>
                <label class="custom-control-label" for="Check2">Blues</label>
                <span class="float-right badge badge-light round"> <?php echo $num_tags_array['blues'] ?></span>
              </div> <!-- form-check.// -->

              <div class="custom-control custom-checkbox">
                <?php  
                  if (isset($_GET['cat'])&& in_array('folk', $_GET['cat'])) { ?>
                    <input type="checkbox" class="custom-control-input" name="cat[]" value="folk" onclick="this.form.submit()" checked="on" id="cat">
                    <?php 
                  }else { ?>
                    <input type="checkbox" class="custom-control-input" name="cat[]" value="folk" onclick="this.form.submit()" id="cat">
                    <?php
                  }
                ?>
                <label class="custom-control-label" for="Check3">Folk</label>
                <span class="float-right badge badge-light round"> <?php echo $num_tags_array['folk'] ?></span>
              </div> <!-- form-check.// -->

              <div class="custom-control custom-checkbox">
                <?php  
                  if (isset($_GET['cat'])&& in_array('psychedelic', $_GET['cat'])) { ?>
                    <input type="checkbox" class="custom-control-input" name="cat[]" value="psychedelic" onclick="this.form.submit()" checked="on" id="cat">
                    <?php 
                  }else { ?>
                    <input type="checkbox" class="custom-control-input" name="cat[]" value="psychedelic" onclick="this.form.submit()" id="cat">
                    <?php
                  }
                ?>
                <label class="custom-control-label" for="Check4">Psychedelic</label>
                <span class="float-right badge badge-light round"> <?php echo $num_tags_array['psychedelic'] ?></span>
              </div> <!-- form-check.// -->
            </div> <!-- card-body.// -->
          </div>
        </article>
        <article class="card-group-item">
          <header class="card-header">
            <h6 class="title">Choose type </h6>
          </header>
          <div class="filter-content">
            <div class="card-body">
            <label class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadio" value="">
              <span class="form-check-label">
                First hand items
              </span>
            </label>
            <label class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadio" value="">
              <span class="form-check-label">
                Brand new items
              </span>
            </label>
            <label class="form-check">
              <input class="form-check-input" type="radio" name="exampleRadio" value="">
              <span class="form-check-label">
                Some other option
              </span>
            </label>
            </div> <!-- card-body.// -->
          </div>
        </article> <!-- card-group-item.// -->
        <article class="card-group-item">
          <header class="card-header">
            <h6 class="title">Choose year </h6>
          </header>
          <div class="filter-content">
            <div class="card-body">
            <label class="form-check">
              <input class="form-check-input" type="radio" name="year" value="60s">
              <span class="form-check-label">
                before 1969
              </span>
            </label>
            <label class="form-check">
              <input class="form-check-input" type="radio" name="year" value="70s">
              <span class="form-check-label">
                1970-1979
              </span>
            </label>
            <label class="form-check">
              <input class="form-check-input" type="radio" name="year" value="80s">
              <span class="form-check-label">
                1980-1989
              </span>
            </label>
            <label class="form-check">
              <input class="form-check-input" type="radio" name="year" value="90s">
              <span class="form-check-label">
                1990-1999
              </span>
            </label>
            <label class="form-check">
              <input class="form-check-input" type="radio" name="year" value="00s">
              <span class="form-check-label">
                2000-2009
              </span>
            </label>
            <label class="form-check">
              <input class="form-check-input" type="radio" name="year" value="10s">
              <span class="form-check-label">
                after 2010
              </span>
            </label>
            </div> <!-- card-body.// -->
          </div>
        </article> <!-- card-group-item.// -->
        <article class="card-group-item">
          <header class="card-header"><h6 class="title">Color check</h6></header>
          <div class="filter-content">
            <div class="card-body">
              <label class="btn btn-danger">
                <input class="" type="checkbox" name="myradio" value="">
                <span class="form-check-label">Red</span>
              </label>
              <label class="btn btn-success">
                <input class="" type="checkbox" name="myradio" value="">
                <span class="form-check-label">Green</span>
              </label>
              <label class="btn btn-primary">
                <input class="" type="checkbox" name="myradio" value="">
                <span class="form-check-label">Blue</span>
              </label>
            </div> <!-- card-body.// -->
          </div>
        </article> <!-- card-group-item.// -->

        <article class="card-group-item">
          <header class="card-header">
            <h6 class="title">Select price range </h6>
          </header>
          <div class="filter-content">
            <div class="card-body">
            <div class="form-row">
            <div class="form-group col-md-6">
              <label>Min</label>
              <input type="number" class="form-control" name="min_price" value="0" placeholder="$0,00">
            </div>

            <div class="form-group col-md-6 text-right">
              <label>Max</label>
              <input type="number" class="form-control" name="max_price" value="50" placeholder="$50,00">
            </div>
            </div>          
      
            <div class="form-group">
              <button type="submit"  class="btn btn-info "><i class="fa fa-search"></i>&nbsp;Search</button>
            </div>
            </div> <!-- card-body.// -->
          </div>
        </article> <!-- card-group-item.// -->
      </div>
      </form>



    </div>
  </div>
</aside>

<aside class="col-sm-9 col-md-9">
  

<?php 

if (sizeof($_GET['cat'])>0) $user_filters_in = ' cd_category IN ('."'".implode("','",$_GET['cat'])."'".') AND ';
else $user_filters_in='';

$query="SELECT * FROM cd WHERE ".$user_filters_in." cd_value BETWEEN '$min' AND '$max'";

if (!empty($_REQUEST["search"])) {
  $search=$_REQUEST["search"];
  $query="SELECT * FROM cd WHERE (cd_title LIKE '%$search%' OR cd_artists LIKE '%$search%' OR cd_studio LIKE '$%search%' OR cd_description LIKE '%$search%' OR cd_isbn LIKE '%$search%') AND ".$user_filters_in." cd_value BETWEEN '$min' AND '$max'";
}

$studio = "".$_GET['studio'];
if(isset($_GET["studio"]) ){
  $studio = "".$_GET['studio'];
  if ($studio!="All") {
    
    $query= $query." AND cd_studio LIKE '$studio'";
  }
}
if(isset($_GET["artist"]) ){
  $artist = "".$_GET['artist'];
  if ($artist!="All") {
    
    $query= $query." AND cd_artists LIKE '$artist'";
  }
}


if (isset($_GET["year"]) && $_GET["year"]!=NULL) {

  $query= $query." AND cd_date BETWEEN '$min_year' AND '$max_year'";
}

//final query 

$search_result=mysqli_query($con, $query);
$count = mysqli_num_rows($search_result);

  if ($search_result) {
    
    $length=mysqli_num_rows($search_result);
    if ($length>0) {
      ?>
        <div class="result"> Results Found :<?php echo $count;?></div>
      <?php

      for($i=0; $i < $length; $i++){
        $rec=mysqli_fetch_array($search_result); ?>
        
          <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
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




    }else {
    ?>
<div class="no-result">No Results</div>
<?php
}
      
  }

mysqli_free_result($search_result);

mysqli_close($con);






?>

</aside>
      </div>
    </div>
  </div>

</div><!-- end of main -->

<?php 
  include("footer.php");
?>



</body>
</html>  