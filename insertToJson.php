<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'covid19');
    if($db === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }
        $file_name = "downloadedData.json";

        $data = file_get_contents($file_name);

        $rows = json_decode($data, true);

        foreach($rows as $row)
        {
                $sql = "INSERT INTO json(name,mobile,email,address,gender,dob) VALUES ('".$row["Name"]."','".$row["Mobile"]."','".$row["Email"]."','".$row["Address"]."','".$row["Gender"]."', '".$row["City"]."')";

                if(!mysqli_query($db,$sql))
                {
                    echo "Error Occured";
                }
        }
        echo "Successully Inserted";

 ?>
