<?php 
require '../Crud_monhoc/config.php';
require '../Crud_monhoc/connectDb.php';


$id = $_GET['id'];
$sql = " DELETE FROM subject WHERE id=$id ";

session_start();
if($conn->query($sql)){
    $_SESSION['success'] = 'Đã xoá nhân viên thành công';
    header('location:index.php');
    exit;
}else 
{
    $_SESSION['error'] = $sql . '<br>' . $conn->error;
    header('location:index.php');
}
 ?>