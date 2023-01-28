<?php 
require '../Crud_monhoc/config.php';
require '../Crud_monhoc/connectDb.php';

$id = $_POST['id'];
$name = $_POST['name'];
$number_of_credit = $_POST['number_of_credit'];
$test_score = $_POST['test_score'];
$rank = $_POST['rank'];

$sql = "UPDATE subject SET name='$name', number_of_credit='$number_of_credit', test_score='$test_score', rank='$rank' WHERE id='$id'";

session_start();
if($conn->query($sql)){
    $_SESSION['success'] = 'Đã cập nhật sinh viên thành công';
    header('location:index.php');
    exit;
}else 
{
    $_SESSION['error'] = $sql . '<br>' . $conn->error;
    header('location:index.php');
}
 ?>