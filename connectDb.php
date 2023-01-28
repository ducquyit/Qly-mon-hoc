<?php 
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
if ($conn->connect_errno){
    die ("Kết nối thất bại: ".$conn->connect_errno);
}
mysqli_set_charset($conn,"utf8");
 ?>