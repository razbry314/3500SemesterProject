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
    <link href="css/shop-item.css" rel="stylesheet">
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

<?php include 'includes/base.php';
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

$id = $_GET["id"];

?>

<div class="container">

    <div class="row">
        <div class="col-md-9">

            <div class="thumbnail">
              <?php
              $sql = "SELECT id, maker, model, price, img, description FROM products WHERE id = $id ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<h2 class=\"page-header text-center\">". $row['maker'] ." ". $row['model'] ."</h2>
                <div class=\"well\">
                  <img class=\"img-responsive\" src=\"SemesterProjectImg/". $row['img']  ."\" alt=\"\">
                    <div class=\"caption-full\">
                      <div>
                        <p>". $row['description'] ."</p>
                      </div>
                    </div>
                  </div>";
              }
            }?>
            </div>


            </div>
            <div class="col-md-3">
              <div class="well">
                <?php
                $sql = "SELECT id, price FROM products WHERE id = $id ";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $itemPrice = number_format($row['price'],2);

                echo "<h3 class=\"text-center\">\$". $itemPrice ."</h3>";
                ?>
                  <hr />
                  <button type="submit" class="btn btn-info center-block">Add to Cart</button>
              </div>
            </div>
        </div>

    </div>


<div class="container">

  <?php include 'includes/harmonix-footer.php'; ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
