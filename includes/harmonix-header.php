<!-- Navigation -->
<?php include "includes/base.php"; ?>
<?php
          if (count($_POST) > 0) {
     foreach ($_POST as $k=>$v) {
         unset($_POST[$k]);
         unset($_SESSION[$k]);
     }
 }
?>
<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #C0C0C0;
    color: white;
    padding: 8px 12px;
    margin: 8px auto 0 8px;
    border: none;
    cursor: pointer;
    width: 100%;
    border-radius: 10%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    height: 20%;
    width: 20%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
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
                      <li><a href="store-grid.php">Guitars</a></li>
                      <li><a href="store-grid.php">Basses</a></li>
                      <li><a href="store-grid.php">Amps</a></li>
                      <li><a href="store-grid.php">Drums</a></li>
                      <li><a href="store-grid.php">Audio</a></li>
                      <li><a href="store-grid.php">Band</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>


            <?php
            // Does this user have an open sessoin
      if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
         ?>

         <ul class="nav navbar-right">
           <li>
             <scri>
             <button onclick="" id="Logout" style="width:auto;" >LogOut</button>
             <script>
              alert("if 1 <?php echo $_SESSION['Username'] ?>");
            </script>
            </li>
          </ul>
       <?php
      }                 //if user is not logged in but username and password are filled out
         elseif(!empty($_POST['username']) && !empty($_POST['password']))
         {
           $username = mysql_real_escape_string($_POST['username']);
           $password = md5(mysql_real_escape_string($_POST['password']));

           $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");

           if(mysql_num_rows($checklogin) == 1)
           {
               $row = mysql_fetch_array($checklogin);
               $email = $row['EmailAddress'];

               $_COOKIE['Username'] = $username;
               $_COOKIE['EmailAddress'] = "charlie";
               $_COOKIE['LoggedIn'] = 1;

               ?>

               <ul class="nav navbar-right">
                 <li>
                   <button onclick="" id="Logout" style="width:auto;" >LogOut</button>
                   <script>
                    alert("If two <?php echo $_SESSION['Username'] ?>");
                  </script>
                  </li>
                </ul>


               <?php
             }
           else{

             ?>
               <script>
                alert("Your acount was not found try again");
              </script>

               <ul class="nav navbar-right">
                 <li>
                   <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>


                   <div id="id01" class="modal">

                     <form class="modal-content animate" action="index.php" method="post">

                   <div class="imgcontainer">
                   <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                   <img src="images/avatar_1.png" alt="Avatar" class="avatar">
                 </div>

                 <div class="container">
                   <label><b>Username</b></label>
                   <input type="text" placeholder="Enter Username" name="username" id="username" required>

                   <label><b>Password</b></label>
                   <input type="password" placeholder="Enter Password" name="password" id="password" required>

                   <button type="submit" name="login" id="login" value="Login">Login</button>
                   <input type="checkbox" checked="checked"> Remember me

                 </div>

                 <div class="container" style="background-color:#f1f1f1">
                   <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                   <span class="psw">Forgot <a href="#">password?</a></span>
                 </div>

               </form>
               <?php
                   }
                }


                else
                {
                  ?>

              <ul class="nav navbar-right">
                <li>
                  <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>


                  <div id="id01" class="modal">

                    <form class="modal-content animate" action="index.php" method="post">

                      <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="images/avatar_1.png" alt="Avatar" class="avatar">
                      </div>

                      <div class="container">
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" id="username" required>

                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required>

                        <button type="submit" name="login" id="login" value="Login">Login</button>
                        <input type="checkbox" checked="checked"> Remember me

                      </div>

                      <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                      </div>

                    </form>
                    <?php
                        }
                        ?>


                  </div>


                  <script>
                  // Get the modal
                  var modal = document.getElementById('id01');

                  // When the user clicks anywhere outside of the modal, close it
                  window.onclick = function(event) {
                      if (event.target == modal) {
                          modal.style.display = "none";
                      }
                  }
                  </script>

              </li>
            </ul>
              <ul class="nav navbar-right">
                <li>
                  <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Register</button>


                  <div id="id02" class="modal">

                    <form class="modal-content animate" action="index.php">
                      <div class="imgcontainer">
                        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="images/avatar_1.png" alt="Avatar" class="avatar">
                      </div>

                      <div class="container">
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" id="username" required>

                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required>

                        <label><b>Password Confirm</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required>
                        <button type="submit">Register</button>

                      </div>

                      <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>

                      </div>
                    </form>
                  </div>

                  <script>
                  // Get the modal
                  var modal = document.getElementById('id02');

                  // When the user clicks anywhere outside of the modal, close it
                  window.onclick = function(event) {
                      if (event.target == modal) {
                          modal.style.display = "none";
                      }
                  }
                  </script>

              <li>
            </ul>

            <div class="col-sm-3 col-md-3 navbar-right">
            <form class="nav navbar-right navbar-nav" role="search">
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
          </div>
            </form>
          </div>

        </div>
        <!-- /.navbar-collapse -->

        <!-- Button to open the modal login form -->

    </div>
    <!-- /.container -->
</nav>
<script>
function f1() {
   sessionStorage.clear();
   <?php
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    session_regenerate_id(true);
?>
   alert("HERE");
    //form validation that recalls the page showing with supplied inputs.
    location.reload();
 }
 window.onload = function() {
document.getElementById("Logout").onclick = function fun() {
 f1();
 //validation code to see State field is mandatory.
}
}
 </script>
