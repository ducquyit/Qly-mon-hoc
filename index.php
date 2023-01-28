<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý môn học</title>
</head>
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
    background-color: bisque;
}

h1,
form,
table,
button {
    margin: 12px 0;
}

button {
    width: 60px;
    height: 40px;
    border-radius: 5px;
    background-color: #33FFFF;

}

a {
    text-decoration: none;
    color: #000;
}

a:hover {
    color: #FF3333;
}

table,
th,
td {
    border: 1px solid #000;
}

table {
    margin: auto;
    border-collapse: collapse;
}

input {
    min-width: 180px;
    height: 40px;
    border-radius: 5px;
    outline: none;
    border: 1px solid #ccc;
}
</style>

<body>
    <h1>Danh sách môn học</h1>
    <?php 
    $search = (!empty($_GET['search']) ? $_GET['search'] : '');
     ?>
    <form action="index.php" method="GET">
        Tìm kiếm: <input type="search" name="search" value="<?= $search ?>" placeholder="Nhập từ cần tìm ...">
    </form>
    <button type="button"><a href="create.php">ADD</a></button>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên môn học</th>
                <th>Số tín chỉ</th>
                <th>Điểm </th>
                <th>Học lực</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php require '../Crud_monhoc/config.php' ?>
            <?php require '../Crud_monhoc/connectDb.php' ?>
            <?php 
            $sql = "SELECT * FROM subject";
            if ($search){
                $sql .= " WHERE name LIKE '%$search%' ";
                // Cách trên dùng phương pháp nối chuỗi
                //Nếu không nối chuỗi thì SELECT * FROM subject WHERE name LIKE '$search'
            }
            $result = $conn->query($sql);
            $order = 0;
            if($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
                    $order++;
             ?>
            <tr>
                <td><?= $order ?></td>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['number_of_credit'] ?></td>
                <td><?= $row['test_score'] ?></td>
                <td><?= $row['rank'] ?></td>
                <td> <a href="edit.php?id=<?=$row['id']?>" class="sua">Sửa</a></td>
                <td> <a href="delete.php?id=<?=$row['id']?>" class="xoa">Xoá</a></td>
            </tr>
            <?php 
                endwhile;
            endif;
             ?>
        </tbody>
    </table>
    <div>
        <span>Số lượng: <?= $order ?></span>
    </div>
</body>

</html>