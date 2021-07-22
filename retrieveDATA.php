<?php
          session_start();
          $db = mysqli_connect('localhost', 'root', '', 'covid19');
          if($db === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
          }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JSON Data</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {
      background-color:color: rgb(255, 180, 0);
    }
</style>
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
    <div id="Jason Data"></div>
    <h1>Data Retrieved from JSON File</h1>
    <script>

        fetch('downloadedData.json')
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                appendDatatoTable(data);
            })
            .catch(function (err) {
                console.log('error: ' + err);
            });
        function appendDatatoTable(data) 
        {
            var mainContainer = document.getElementById("Jason Data");
            var body = document.getElementsByTagName('body')[0];
            var tbl = document.createElement('table');
            tbl.style.width = '80%';
            tbl.setAttribute('border', '1');
            var tbdy = document.createElement('tbody');
            
            for (var i = 0; i <= data.length; i++) 
            {
              var tr = document.createElement('tr');
              for (var j = 0; j < 7; j++) 
              {
                  if(i==0)
                  {
                      var td = document.createElement('td');
                      switch(j)
                      {
                          case 0:
                            td.appendChild(document.createTextNode('Name'))
                            break;
                          case 1:
                            td.appendChild(document.createTextNode('Mobile'))
                            break;
                          case 2:
                            td.appendChild(document.createTextNode('Email'))
                            break;
                          case 3:
                            td.appendChild(document.createTextNode('Address'))
                            break;
                          case 4:
                            td.appendChild(document.createTextNode('Gender'))
                            break;
                          case 5:
                            td.appendChild(document.createTextNode('City'))
                            break;
                          case 6:
                            td.appendChild(document.createTextNode('DOB'))
                            break;
                      }
                      tr.appendChild(td)
                  }
                  else
                  {
                      var td = document.createElement('td');
                      switch(j)
                      {
                          case 0:
                            td.appendChild(document.createTextNode(data[i-1].Name))
                            break;
                          case 1:
                            td.appendChild(document.createTextNode(data[i-1].Mobile))
                            break;
                          case 2:
                            td.appendChild(document.createTextNode(data[i-1].Email))
                            break;
                          case 3:
                            td.appendChild(document.createTextNode(data[i-1].Address))
                            break;
                          case 4:
                            td.appendChild(document.createTextNode(data[i-1].Gender))
                            break;
                          case 5:
                            td.appendChild(document.createTextNode(data[i-1].City))
                            break;
                          case 6:
                            td.appendChild(document.createTextNode(data[i-1].Dob))
                            break;
                      }
                      tr.appendChild(td)
                  }
              }
              tbdy.appendChild(tr);
            }
            tbl.appendChild(tbdy);
            body.appendChild(tbl)

            /*for (var i = 0; i < data.length; i++) {
                var div = document.createElement("div");
                div.innerHTML = 'Name: ' + data[i].Name + ',  Mobile: ' + data[i].Mobile + ',  Email: ' + data[i].Email + ',  Address: ' + data[i].Address + ',  Gender: ' + data[i].Gender + ',  City: ' + data[i].City;
                mainContainer.appendChild(div);
            }*/
        }
    </script>
</body>
</html>
