<?php
session_start();

// initializing variables
$name = "";
$mobile = "";
$altMobile = "";
$address = "";
$nation = "";
$pin = "";
$country = "";
$city = "";
$gender = "";
$day = "";
$month = "";
$year = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'covid19');
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['Submit'])) 
{
  // receive all input values from the form
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $mobile = $_POST['Mobile'];
  $altMobile = $_POST['AltMobile'];
  $address = $_POST['Address'];
  $nation = $_POST['Nationality'];
  $pin = $_POST['Pin'];
  $country = $_POST['Country'];
  $gender = $_POST['Gender'];
  $day = $_POST['Day'];
  $month = $_POST['Month'];
  $year = $_POST['Year'];
  $city = $_POST['City'];

  $pass1 = $_POST['Password1'];
  $pass2 = $_POST['Password2'];

  $date = $year.'-'.$month.'-'.$day;

  if ($pass1 != $pass2) {
    echo $pass1;
    echo $pass2;
    echo "The two passwords do not match";
  }

  $user_check_query = "SELECT * FROM registration WHERE mobile='$mobile' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) 
  {
    if ($user['mobile'] == $mobile)
    {
      $_SESSION['message'] = "Mobile Number already Register";
      Header("location: login.php");
      exit();
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {

    $file_name = "downloadedData.json";

    $dataArray=array();
    $dataArray[]=array('Name' =>$name, 
                      'Email' =>$email, 
                      'Mobile' =>$mobile, 
                      'Address' =>$address, 
                      'Nation' =>$nation, 
                      'Country' =>$country, 
                      'Gender' =>$gender, 
                      'City' =>$city, 
                      'Dob' =>$date);
    $fp = fopen($file_name, 'a');
    fwrite($fp, json_encode($dataArray));
    fclose($fp);

    $query1 = "INSERT INTO registration (name, email, altmobile, mobile, address, nation, country, pin, gender, city, dob, password) 
          VALUES('$name', '$email', '$altMobile', '$mobile', '$address', '$nation', '$country', '$pin', '$gender', '$city', '$date', '$pass1')";
        mysqli_query($db, $query1);

        $query2 = "INSERT INTO status (mobile, description) VALUES('$mobile', 'Application Submitted')";
        $result = mysqli_query($db, $query2);

    if($result)
    {
        $_SESSION['message'] = "Successfully Registered";
        header('location: home.php');
    }
  }
}

if (isset($_POST['LogIn'])) 
{
    $mobile = $_POST['Mobile'];
    $password = $_POST['Password'];

    $query = "SELECT * FROM registration WHERE mobile='$mobile' AND password='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) 
    {
      if( isset($_POST['remember']) )
      {
          echo "hi!";
          setcookie('mobile', $mobile, time()+60*60*7);
          setcookie('password', $password, time()+60*60*7);
      }
      else
      {
          setcookie('mobile', '', time()+60*60*7);
          setcookie('password', '', time()+60*60*7);
      }

      $_SESSION['mobile'] = $mobile;
      $_SESSION['message'] = "You are now logged in";
      header('location: home.php');
    }
    else 
    {
      $_SESSION['message'] = "Wrong Mobile and Password Combination";
      header('location:login.php');
    }
}

if (isset($_POST['send'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $message = $_POST['message'];

    $query = "INSERT INTO contact (name, email, mobile, message) VALUES('$name', '$email', '$mobile', '$message')";
    $result = mysqli_query($db, $query);

    if(!$result) 
    {
        die(mysqli_error($db));
    }
    else 
    {
        $_SESSION['message'] = "Query Submittted Successfully";
        header('location: contact.php');
        exit();
    }
}
if(isset($_POST['AdminLogIn']))
{
    if(isset($_SESSION['mobile']))
    {
        $_SESSION['message'] = "You're logged in as Public, please log out from there for log in as admin";
        header('location: home.php');
    }

    $Aid = $_POST['Aid'];
    $password = $_POST['APassword'];

    $query = "SELECT * FROM admin WHERE Aid='$Aid' AND password='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) 
    {
      $_SESSION['admin'] = $Aid;
      $_SESSION['message'] = "You are now logged in as Admin";
      header('location: home.php');
    }
    else 
    {
      $_SESSION['message'] = "Invalid Credentials";
      header('location:adminLog.php');
    }
}
