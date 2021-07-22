<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'covid19');
  if($db === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  if(isset($_SESSION['mobile'])){
    $username = $_SESSION['mobile'];
  }
  

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Fegistration form</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/email-icon.png" type="image/gif" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="validator.js"></script>
  </head>
  <body>
    <div class="topnav">
            <img class = 'logo' src="images/logo1.png" width="50" height="60"></a>
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
    <form name="RegForm" onsubmit="return validateForm()"  method="POST" action="submit.php">
      <h1>Register Yourself Here</h1>
      <fieldset>
        <legend>
          <h3>Contact Details</h3>
        </legend>
        <div  class="contact-details">
          <div><label>Mobile Number*</label><input type="Phone" name="Mobile"></div>
          <div><label>Alternate Mobile</label><input type="Phone" name="AltMobile" ></div>
          <div><label>E-Mail*</label><input type="text" name="Email"></div>
        </div>
      </fieldset>
      <fieldset>
        <legend>
          <h3>Personal Details</h3>
        </legend>
        <div  class="personal-details">
          <div>
            <div><label>Name*</label><input type="text" name="Name"></div>
            <div><label>Phone*</label><input type="text" name="Phone"></div>
            <div><label>Address*</label><input type="text" name="Address"></div>
            <div><label>City*</label><input type="text" name="City"></div>
            <div><label>Country*</label><input type="text" name="Country"></div>
          </div>
          <div>
            <div>
              <label>Gender*</label>
              <div class="gender">
                <label><input type="radio" name="Gender" value="male"> Male</label>
                <label><input type="radio" name="Gender" value="female"> Female</label> 
              </div>
              <div class="error" id="genderErr"></div>
            </div>
            <div class="birthdate">
              <label>Birthdate*</label>
              <div class="bdate-block">
                <select class="day" id = "Day" name="Day">
                  <option value=""></option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
                <select class="mounth" id = "Month" name="Month">
                  <option value=""></option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
                <input type="text" name="Year">
              </div>
            </div>
            <div><label>Nationality*</label><input type="text" name="Nationality"></div>
            <div><label>Pin Code*</label><input type="text" name="Pin"></div>
            <div>
              <label>Children*</label>
              <div class="children"><input type="checkbox" name="Children"></div>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset>
        <legend>
          <h3>Password</h3>
        </legend>
          <div  class="contact-details">
          <div><label>Password*</label><input type="Password" name="Password1" required="Please Make your password"></div>
          <div><label>Confirm Password*</label><input type="Password" name="Password2" required="Please confirm your password"></div>
        </div>
      </fieldset>

      <fieldset>
        <legend>
          <h3>Terms and Conditions</h3>
        </legend>
        <div  class="terms-mailing">
          <div class="checkbox">
            <input type="checkbox" name="Checkbox" required="Please Accept all terms and conditionss"><span>I accept All terms and conditions.</a></span>
          </div>
      </fieldset>
      <button type="submit" value="send" name="Submit">Submit</button>
    </form>
    </div> 
  </body>
</html>