<?php include "includes/base.php"; ?>
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

<style>
body {
	margin-top: 20px;
}</style>
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
     include "includes/harmonix-header-user.php";
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));

    $sql = "SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'";
    $result = $conn->query($sql);


    if ($result->num_rows ==1)
    {
      $row = $result->fetch_assoc();
      $email = $row['EmailAddress'];
      $avatar= $row['Avatar'];
      $userid= $row['UserID'];

      $_SESSION['Username'] = $username;
      $_SESSION['EmailAddress'] = $email;
      $_SESSION['Avatar'] = $avatar;
      $_SESSION['LoggedIn'] = 1;
      $_SESSION['UserID']= $userid;



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

<?php
  if(!empty($_SESSION['Username'])){
    $cartquery = "SELECT * FROM cart WHERE Username = '".$_SESSION['Username']."'";
    $result = $conn->query($cartquery);

    if($result->num_rows >= 1)
    {
      $row = $result->fetch_assoc();
      $username = $row['Username'];
      $cartid = $row['cartid'];
      $prodid = $row['productid'];

      $_SESSION['Username'] = $username;
      $_SESSION['cartid'] = $cartid;
      $_SESSION['productid']= $prodid;

  }
}
?>
<div class="container">
  <?php
  $cartquery = "SELECT * FROM products WHERE id = '".$_SESSION['productid']."'";
  $result = $conn->query($cartquery);

    if ($result->num_rows > 0) {


      // output data of each row
      while($row = $result->fetch_assoc()) {
        if($row['id']== $_SESSION['productid']){?>
          <div class="row">
        		<div class="col-xs-8">
        			<div class="panel panel-info">
        				</div>
        				<div class="panel-body">
        					<div class="row">
        						<div class="col-xs-2"><img class="img-responsive" src="SemesterProjectImg/<?php echo $row['img'];?>">
        						</div>
        						<div class="col-xs-4">
        							<h4 class="product-name"><strong>Maker: <?php echo $row['maker'];?> </br>Model: <?php echo $row['model'];?></strong></h4><h4><small><?php echo $row['description']; ?></small></h4>
        						</div>
        						<div class="col-xs-6">
        							<div class="col-xs-6 text-right">
        								<h6><strong>$<?php echo $row['price'];?> <span class="text-muted">x</span></strong></h6>
        							</div>
        							<div class="col-xs-4">
        								<input type="text" class="form-control input-sm" value="1">
        							</div>
        							<div class="col-xs-2">
        								<button type="button" class="btn btn-link btn-xs">
        									<span class="glyphicon glyphicon-trash"> </span>
        								</button>
        							</div>
        						</div>
        					</div>
                  <?php
        }
      }
    }
  ?>
	
					<hr>
					<div class="row">
						<div class="text-center">
							<div class="col-xs-9">
								<h6 class="text-right">Added items?</h6>
							</div>
							<div class="col-xs-3">
								<button type="button" class="btn btn-default btn-sm btn-block">
									Update cart
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total <strong>$50.00</strong></h4>
						</div>
						<div class="col-xs-3">
							<button type="button" class="btn btn-success btn-block">
								Checkout
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
