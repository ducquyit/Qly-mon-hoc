<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Crud_monhoc/public/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php 
    require '../Crud_monhoc/config.php';
    require '../Crud_monhoc/connectDb.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM subject WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
     ?>
    <h1>Chỉnh sửa môn học</h1>
    <form action="update.php" method="POST">
        <input type="hiddeen" name="id" value="<?= $row['id'] ?>">
        <div class="form-group">
            <label>Tên môn học</label>
            <input type="text" class="form-control" placeholder="Tên môn học cần sửa" required name="name"
                value="<?= $row['name'] ?>">
        </div>
        <div class="form-group">
            <label>Số tín chỉ</label>
            <input type="text" class="form-control" placeholder="Số tín chỉ" required name="number_of_credit"
                value="<?= $row['number_of_credit'] ?>">
        </div>
        <div class="form-group">
            <label>Điểm thi</label>
            <input type="text" class="form-control" placeholder="Điểm thi" required name="test_score"
                value="<?= $row['test_score'] ?>">
        </div>
        <div class="form-group">
            <label>Xếp loại</label>
            <input type="text" class="form-control" placeholder="Học lực" required name="rank"
                value="<?= $row['rank'] ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Lưu</button>
        </div>
    </form>
</body>

</html>