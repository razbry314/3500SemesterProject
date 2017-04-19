<?php include "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>User Management System (Tom Cameron for NetTuts)</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<style>
h2,label {
  font-family: Impact, sans-serif;
}

form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #C0C0C0;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
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
</style>
<body>
<div id="main">
<?php
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    $email = mysql_real_escape_string($_POST['email']);
    $avatar = $_POST['avatar'];

     $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");

     if(mysql_num_rows($checkusername) == 1)
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
     }
     else
     {
        $registerquery = mysql_query("INSERT INTO users (Username, Password, EmailAddress, Avatar) VALUES('".$username."', '".$password."', '".$email."', '".$avatar."')");
        if($registerquery)
        {
            echo "<h1>Success</h1>";
            echo "<p>Your account was successfully created. Please <a href=login.php>click here to login</a>.</p>";
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please go back and try again.</p>";
        }
     }
}
else
{
    ?>

    <h2>Registration Form</h2>

    <form action="register.php" method="post">
      <div class="imgcontainer">
        <img src="../images/HarmonicsTestNoBackground.png" alt="Avatar" class="avatar" style="margin:-200px;">
      </div>

      <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <input type="radio" name="avatar" value="1"> Avatar1
        <input type="radio" name="avatar" value="2"> Avatar2
        <input type="radio" name="avatar" value="3"> Avatar3
        <input type="radio" name="avatar" value="4"> Avatar4</br>

        <label><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Register</button>
        <input type="checkbox" checked="checked"> Remember me
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <a href="../index.php"><button type="button" class="cancelbtn">Cancel</button></a>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form>
      <?php
    }
        if(isset($_POST['username']) && isset($_POST['password'])){
          $_SESSION['username']= $_POST['username'];
          $_SESSION['password']= $_POST['password'];
        }
      ?>
    </body>
    </html>
