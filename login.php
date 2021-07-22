<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'covid19');
  if($db === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

    if(isset($_SESSION['admin']))
    {
        $_SESSION['message'] = "You are now logged in as Admin, please log out for log in as User";
        echo "<script>alert('{$_SESSION['message']}');</script>";
        header('location: home.php');
        exit();
    }

    if(isset($_SESSION['mobile']))
    {
        $username = $_SESSION['mobile'];
    }

    if (isset($_SESSION['message']))
    {
        $show_message = $_SESSION['message'];
        $_SESSION['message'] = null;
    }
    if (isset($show_message)) 
    {
        echo "<script>alert('{$show_message}');</script>";
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Log In</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="style.css">
    <script src="validator.js"></script>
  </head>
  <body>
    <div class="topnav">
            <img class = 'logo' src="images/logo1.png" width="50" height="60">
            <?php if(isset($_SESSION['admin']))
            {
                echo '<a href="logout.php">ADMIN LOG OUT</a>';
                $helloText = $_SESSION['admin'];
                echo "<a> Hello, $helloText</a>";
            }
            else 
            {
                echo '<a href="adminLog.php">ADMIN LOG IN</a>';
            }; ?>

            <?php if(isset($_SESSION['mobile']))
            {
                echo '<a href="logout.php">PUBLIC LOG OUT</a>';
                $helloText = $_SESSION['mobile'];
                echo "<a> Hello, $helloText</a>";
            }
            else 
            {
                echo '<a href="login.php">PUBLIC LOG IN</a>';
            }; ?>
            <a href="retrieveDATA.php">JSON DATA</a>
            <a href="status.php">Registration Status</a>
            <a href="contact.php">Contact Us</a>
            <a href="registration.php">Register Yourself</a>
            <a href="home.php">Home</a>
    </div> 
    
    <div class="main-block">
    <form name="LogInForm" method="POST" action="submit.php">
      <h1>Log In Here</h1>
      <fieldset>
        <legend>
          <h3>Please Enter Your Registered Mobile Nummber and Password</h3>
        </legend>
        <div  class="contact-details">
          <div><label>Mobile Number*</label><input type="Phone" name="Mobile"value="<?php if(isset($_COOKIE["mobile"])) { echo $_COOKIE["mobile"]; } ?>"></div>
          <div><label>Password</label><input type="Password" name="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"></div>
        </div>
      </fieldset>
      <label><input type="checkbox" checked="checked" name="remember" > Remember me</label>
      <button type="submit" value="send" name="LogIn">Submit</button>
      </form>
    </div> 
  </body>
</html>