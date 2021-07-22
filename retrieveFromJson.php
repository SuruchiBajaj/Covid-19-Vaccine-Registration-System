<?php
          session_start();
          $db = mysqli_connect('localhost', 'root', '', 'covid19');
          if($db === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
          }
          
          $query = "SELECT * FROM json";
          $res = mysqli_query($connect,$query);

          $data_array = array();
          while($rows =mysqli_fetch_assoc($res))
          {
                $data_array[] = $rows;
          }

          $fp = fopen('retrieved_data.json', 'w');
          if(!fwrite($fp, json_encode($data_array)))
          {
                  die('Error : File Not Opened. ' . mysql_error());
          }
         else
         {
                  echo "Data Retrieved Successully!!!";
         }
         fclose($fp);

?>