<?php
$test=json_decode(file_get_contents("php://input"), true);
get_data("INSERT INTO info(temperature,humidity) VALUES('{$test['temp']}','{$test['hum']}')");
function get_data($query) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gardensensors";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = $query;
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}