<?php 
require '../Crud_monhoc/config.php';
require '../Crud_monhoc/connectDb.php';

$name = $_POST['name'];
$number_of_credit = $_POST['number_of_credit'];
$test_score = $_POST['test_score'];
$rank = $_POST['rank'];

$sql = "INSERT INTO subject (name, number_of_credit, test_score, rank) VALUE ('$name','$number_of_credit', '$test_score', '$rank')";

session_start();
if($conn->query($sql)){
    $_SESSION['success'] = 'Đã tạo nhân viên thành công';
    header('location:index.php');
    exit; //kết thúc không chạy code bên dưới
}else {
    $_SESSION['error'] = $sql . '<br>' .$conn->error;
    header('location:index.php');
}
 ?>