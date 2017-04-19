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
   }
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Harmonixdb";
  $type = $_GET["type"];
  $title = "";

  switch ($type) {
    case 'eguitar':
      $title = "Electric Guitars";
      $typeSql = "WHERE type = 'eguitar'";
      break;
    case 'aguitar':
        $title = "Acoustic Guitars";
        $typeSql = "WHERE type = 'aguitar'";
        break;
    case 'amps':
      $title = "Amps";
      $typeSql = "WHERE type = 'amps'";
      break;
    case 'audio':
      $title = "Audio Supplies";
      $typeSql = "WHERE type = 'audio'";
      break;
    case 'drum':
      $title = "Drums";
      $typeSql = "WHERE type = 'drums'";
      break;
    case 'bass':
      $title = "Basses";
      $typeSql = "WHERE type = 'bass'";
      break;
    case 'band':
      $title = "Band Instruments";
      $typeSql = "WHERE type = 'band'";
      break;
    case 'ds':
      $title = "Deals & Steals";
      $typeSql = "WHERE sale = 1";
      break;
    default:
      $title = "All Products";
      $typeSql = "";
      break;
  }



  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="col-lg-12">
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header text-center"><?php echo $title; ?></h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="col-lg-3">
            <div class="well">
              <div class="form-group">
                <label for="keyFilter">Filter by Keyword</label>
                <div>
                  <input type="text" class="form-control" id="keyFilter">
                </div>
                <hr />
                <label>Brand</label>
                <br />
                <div class="form-check-label">
                  <?php
                  $sql = "SELECT DISTINCT maker FROM products ";
                  $sql .= $typeSql;
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      echo "<input type=\"checkbox\" class=\"form-check-input\">";
                      echo $row['maker'];
                      echo "<br />";
                    }
                  }
                    ?>
                </div>
                <div class="form-check-label">

                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-9">
        <!-- Projects Row -->
        <div class="row">
          <?php
          $sql = "SELECT maker, model, price, img, type, sale FROM products ";
          $sql .= $typeSql;
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<div class=\"col-md-3 portfolio-item\">
              <div class=\"thumbnail\">
                  <a href=\"#\">
                      <img class=\"img-responsive img-thumbnail\" src=\"SemesterProjectImg/". $row['img']  ."\" alt=\"\">
                    </a>
                    <h3 class=\"text-center\">
                      <a href=\"#\">". $row['maker'] . " ". $row['model'] ."</a>
                    </h3>
                    <p>". $row['price'] ."</p>
              </div>
            </div>";
          }
        } ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <!--<div class="row text-center">
            <div class="col-lg-9">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div> -->
      </div>
    </div>
  </div>
        <!-- /.row -->

    <!-- /.container -->
    <div class="container">

<<<<<<< HEAD
        <!-- Footer -->
      <?php include "includes/harmonix-footer.php" ?>
=======
      <?php include 'includes/harmonix-footer.php'; ?>
>>>>>>> bdffe5f009b38867ba637a20bfe4ff7bd8311a7c

    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <?php $conn->close(); ?>

</body>

</html>
