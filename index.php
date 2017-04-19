<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Harmonix</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.10.1/bootstrap-social.css" rel="stylesheet" >

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <?php include "includes/base.php"; ?>

  <?php
  if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
  {
       include "includes/harmonix-header-user.php";
  }
  elseif(!empty($_POST['username']) && !empty($_POST['password']))
  {
      $username = mysql_real_escape_string($_POST['username']);
      $password = md5(mysql_real_escape_string($_POST['password']));

      $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");

      if(mysql_num_rows($checklogin) == 1)
      {
          $row = mysql_fetch_array($checklogin);
          $email = $row['EmailAddress'];
          $avatar= $row['Avatar'];

          $_SESSION['Username'] = $username;
          $_SESSION['EmailAddress'] = $email;
          $_SESSION['Avatar'] = $avatar;
          $_SESSION['LoggedIn'] = 1;

          echo "<h1>Success</h1>";
          echo "<p>We are now redirecting you to the member area.</p>";
          echo "<meta http-equiv='refresh' content='=2;index.php' />";
      }
      else
      {

        echo '<script type="text/javascript">alert("Incorrect Login please try again");</script>';

        include 'includes/harmonix-header.php';

      }
  }
  else
  {
     include 'includes/harmonix-header.php';
   }?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="SemesterProjectImg/CarImg1.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="SemesterProjectImg/dsHomePage.png" alt="">
                            <div class="caption">
                                <h3 class="text-center"><a href="store-grid.php?type=ds">Deals & Steals</a>
                                </h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img class="img-responsive" src="SemesterProjectImg/egHomePage.png" alt="">
                            <div class="caption">
                                <h3 class="text-center"><a href="store-grid.php?type=eguitar">Electric Guitars</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="SemesterProjectImg/agHomePage.png" alt="">
                            <div class="caption">
                                <h3 class="text-center"><a href="store-grid.php?type=aguitar">Acoustic Guitars</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="SemesterProjectImg/ampHomePage.png" alt="">
                            <div class="caption">
                                <h3 class="text-center"><a href="store-grid.php?type=amps">Amps</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="SemesterProjectImg/audioHomePage.png" alt="">
                            <div class="caption">
                                <h3 class="text-center"><a href="store-grid.php?type=audio">Audio</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="SemesterProjectImg/egHomePage.png" alt="">
                            <div class="caption">
                                <h3 class="text-center"><a href="store-grid.php?type=band">Band</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">


        <hr>

        <!-- Footer -->

      <?php include 'includes/harmonix-footer.php'; ?>


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
