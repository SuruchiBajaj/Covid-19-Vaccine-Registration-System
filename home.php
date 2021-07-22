<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'covid19');
  if($db === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
    if(isset($_SESSION['admin']))
    {
        $admin = $_SESSION['admin'];
        $helloText = $_SESSION['admin'];
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
<html>
    <head>
        <Title>Covid Vaccine Registration</Title>
        <style>
            body {
              margin: 0;
              background-image: url("images/banner-bg.png");
              background-color: lightblue;
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: cover;
            }
            .topnav {
              overflow: hidden;
              padding-right: 30px;
              background-color: rgb(255, 180, 0);
            }
            
            .topnav a {
              float: left;
              color: #f2f2f2;
              text-align: center;
              padding: 14px 16px;
              font-size: 17px;
            }
            
            .topnav a:hover {
              background-color: rgb(8, 10, 0);
            }
            .im {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            }
            
            ul {
                display: table;
                margin-left: auto;
                margin-right: auto;
                list-style-type: circle;
            }

            ul li {
                margin-right: 1rem;
            }
        </style>
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    </head>
    <body>
      <img class = 'logo' src="images/logo1.png" width="50" height="60">
      <div class="topnav">
            <?php if(isset($_SESSION['admin']))
            {
                echo '<a href="logout.php">ADMIN LOG OUT</a>';
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
           
        <br>
         <h3 style="color:rgb(21, 92, 158); text-align: center; left"> <marquee>Get Vaccinated yourself by registering here and track the record of your doses.</marquee></h3>
        <br>
        <div class="banner_section layout_padding">
      <div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
            <div class="col-sm-1">
              <div class="line"><img src="images/linr-icon.png"></div>
              <div class="left_img"><img src="images/vaccine.png"></div>
            </div>
            <div class="col-sm-5">
              <h1 class="furniture_text">GET</h1>
              <h1 class="trends_text">VACCINATED</h1>
              <h1 class="furniture_text">YOURSELF</h1>
              <p class="lorem_text">As like you would have known that in India COVID19 vaccination drive has been started, India have launched two vaccines, which are COVAXIN and COVISHIELD, both vaccine required two doses to be injected to produce antibody against COVID. </p>
              

              <?php if(isset($_SESSION['mobile']))
              {
                  echo '<form action="logout.php"><button class="more_bt" type="submit">LOG OUT</button></form>';
              }
              else 
              {
                  echo '<form action="login.php"><button class="more_bt" type="submit">LOG IN</button></form>';
              }; ?>
              

              <form action="registration.php">  
                <button class="furniture_bt" type="submit">REGISTER</button>
              </form>
            </div>
            <div class="col-sm-6">
              <div><img src="images/vaccine-mob.png" width="900" height="900"></div>
            </div>
          </div>
    </div>
    </div>
    </body>
</html>