<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "information_schema";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn && $conn->connect_error) {
  echo 'Connection failed: ' . $conn->connect_error;
}else{
  // echo 'Connection succes!';
  $query = "SELECT * FROM TABLES WHERE TABLE_SCHEMA = '". $_GET["id_schema"] ."'";
  $result = $conn->query($query);
  // var_dump($result);
  if (!$result) {
    echo 'Il database è errato!';

  }else if($result->num_rows == 0){
    echo 'la query ha dato 0 risultati';

  }else{

    $database = [];

    while ($row = $result->fetch_assoc()) {
      // var_dump($row);
      // echo " <br> lo studente n. " .$row['id_studente'] . " con nome: " .$row['nome'] . " email: " .$row['email'] . " telefono: " .$row['telefono'];
      $database[] = $row; 
    }

    // var_dump($database);
    // print_r($database);


  }
}