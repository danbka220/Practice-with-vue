<?php 
$test=json_decode(file_get_contents("php://input"), true);
echo get_data($test["sql"]);

function get_data($query) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school_patent";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = $query;
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
        $response = array(); 
        while($row = mysqli_fetch_assoc($result)){ 
        $response[] = $row; 
        } 
        echo json_encode($response); exit;
    } else {
      echo "";
    }

    $conn->close();
}