<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'covid19');
	if($db === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	// SQL query to select data from database

	if(isset($_SESSION['mobile']))
	{
		$username = $_SESSION['mobile'];

		$sql = "SELECT * FROM status where mobile='$username'";
		$result = mysqli_query($db, $sql);
	}
	else
	{
		$_SESSION['message'] = "Please Log in first to see your registration status";
		header('location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Application Status</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="topnav">
			<img class = 'logo' src="images/logo1.png" width="50" height="60">
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
	<section>
		<h1>Your Application Status is here</h1>
		<!-- TABLE CONSTRUCTION-->
		<table padding-top: 50px>  
			
			<tr>
				<th>Date & Time</th>
				<th>Description</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['date'];?></td>
				<td><?php echo $rows['description'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>
</html>
