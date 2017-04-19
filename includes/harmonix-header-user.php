<!-- Navigation -->


<style>

.button {
  font: bold 11px Arial;
  text-decoration: none;
  background-color: #EEEEEE;
  color: #333333;
  padding: 2px 6px 2px 6px;
  margin: 7px 2px auto 2px;;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
  border-radius: 10%;
  width :auto;
}

</style><nav class="navbar navbar-inverse navbar-fixed-top nav-back" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header nav-back">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="images/Harmonix2.png" class="Logo"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-left navbar-nav ">
                <li class="dropdown">
                    <a <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="store-grid.php?type=eguitar">Electric Guitars</a></li>
                      <li><a href="store-grid.php?type=aguitar">Acoustic Guitars</a></li>
                      <li><a href="store-grid.php?type=bass">Basses</a></li>
                      <li><a href="store-grid.php?type=amps">Amps</a></li>
                      <li><a href="store-grid.php?type=audio">Audio</a></li>
                      <li><a href="store-grid.php?type=band">Band</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="nav navbar-right">
              <li>
                <a href="cart.php" class="button" title="Cart" style="margin-left:4px;"><span class="glyphicon glyphicon-shopping-cart"></span></a>
              </li>
            </ul>
            <ul class="nav navbar-right">
              <li>
                <a href="user-profile.php" class="button" title="User" style="margin-left:4px;"><span class="glyphicon glyphicon-user"></span></a>
              </li>
            </ul>
            <ul class="nav navbar-right">
              <li>
                <a href="includes/logout.php" class="button" title="Logout" style="margin-left:4px;"><span class="glyphicon glyphicon-log-out"></span></a>
              </li>
            </ul>

            <!-- SEARCH BAR BEGINNING -->
            <div class="col-sm-3 col-md-3 navbar-right">
            <form class="nav navbar-right navbar-nav" role="search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="button" type="submit" style="margin=8px;padding:10px;"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
            </form>
            </div>
            <!-- SEARCH BAR END -->

            </div>


    </div>
</div>
</nav>
