
<div class="top-fixed">
<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button><?php if (isset($_SESSION["admin"])) {?>
        <a class="navbar-brand" href="indexA.php"><img src="./images/hd-2.png" alt="logo"/></a>    
        <?php 

      }elseif (isset($_SESSION["username"])) {?>
        <a class="navbar-brand" href="indexU.php"><img src="./images/hd-2.png" alt="logo"/></a> <?php 
      }else { ?>
        <a class="navbar-brand" href="index.php"><img src="./images/hd-2.png" alt="logo"/></a> <?php 
      } ?> 
    </div>

    <!-- nav links, forms, and other content -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categories.php?cat%5B%5D=rock">Rock</a></li>
            <li><a href="categories.php?cat%5B%5D=blues">Blues</a></li>
            <li><a href="categories.php?cat%5B%5D=folk">Folk</a></li>
            <li><a href="categories.php?cat%5B%5D=psychedelic">Psychedelic Rock</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="categories.php">All Categories</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Artists <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categories.php?artist=Led Zeppelin">Led Zeppelin</a></li>
            <li><a href="categories.php?artist=Pink Floyd">Pink Floyd</a></li>
            <li><a href="categories.php?artist=The Rolling Stones">The Beattles</a></li>
            <li><a href="categories.php?artist=EMI Studios">The Rolling Stones</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="categories.php">All Artists</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Studios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categories.php?studio=Britannia Row">Britannia Row</a></li>
            <li><a href="categories.php?studio=Columbia">Columbia</a></li>
            <li><a href="categories.php?studio=Decca">Decca</a></li>
            <li><a href="categories.php?studio=EMI Studios">EMI Studios</a></li>
            <li><a href="categories.php?studio=IBC Records">IBC Records</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="categories.php">All Studios</a></li>
          </ul>

        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Year <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categories.php?year=60s">before 1969</a></li>
            <li><a href="categories.php?year=70s">1970-1979</a></li>
            <li><a href="categories.php?year=80s">1980-1989</a></li>
            <li><a href="categories.php?year=90s">1990-1999</a></li>
            <li><a href="categories.php?year=00s">2000-2009</a></li>
            <li><a href="categories.php?year=10s">after 2010</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="categories.php">All Years</a></li>
          </ul>
        </li>
      </ul>
      <form action="categories.php" method="post" class="navbar-form navbar-left" role="search">

        <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Album,Band,Song...">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><?php if (!isset($_SESSION["username"])) { ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
          <ul id="login-dp" class="dropdown-menu">
            <li>
               <div class="row">
                  <div class="col-md-12">
                    Login 
                    <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
                      <div class="form-group">
                        <label class="sr-only" for="exampleInputUsername2">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Useranme" required>
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                      </div>
                    </form>
                  </div>
                  <div class="bottom text-center">
                    New here ? <a href="signup.php"><b>Join Us</b></a>
                  </div>
               </div>
            </li>
          </ul>
        </li><?php 
        }elseif(isset($_SESSION["admin"])) { ?>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["username"]; ?><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="customers.php">Customers</a></li>
              <li><a href="albums.php">Albums</a></li>
            </ul> 
          <li class="nav nav-tab"><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out " aria-hidden="true"></a></li>
          <?php 
          }else { ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Hello ".$_SESSION["firstname"]; ?><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="profil.php">Profil</a></li>
              <li><a href="cart.php">Cart</a></li>
              <li class="divider"></li>
                <li><a href="show_history.php">Cart History</a></li>
            </ul>
            </li>
            <li class="nav nav-tab"><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out " aria-hidden="true"></a></li>
            <?php
          } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
