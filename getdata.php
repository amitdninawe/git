<?php
error_reporting(0);

$mysqli = new mysqli("50.62.22.142","zim_lab","zim_lab@123","zim_lab");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

// Perform query
$result = $mysqli -> query("select * from zim_lab.zim_prod_data limit 400000");
   //echo "Returned rows are: " . $result -> num_rows;
   //select `productivity_data_logger`.`DT_TIME` AS `DT_TIME`,`productivity_data_logger`.`CLIENT_ID` AS `CLIENT_ID`,`productivity_data_logger`.`DEVICE_ID` AS `DEVICE_ID`,`productivity_data_logger`.`current` AS `CURRENT`,`productivity_data_logger`.`idle_time` AS `idle_time`,`productivity_data_logger`.`on_time` AS `on_time`,`productivity_data_logger`.`off_time` AS `off_time`,round(((((3 * `productivity_data_logger`.`current`) * 415) * 1.73) / 60),2) AS `kw` from `productivity_data_logger` 
//WHERE CAST(dt_time AS DATE) BETWEEN '2021-07-01' AND '2021-07-31'
 //order by `productivity_data_logger`.`DT_TIME` DESC LIMIT 100
        

while($row = mysqli_fetch_assoc($result)) {        
 
        $posts[] = $row;
    }


echo(json_encode($posts));
$mysqli -> close();

