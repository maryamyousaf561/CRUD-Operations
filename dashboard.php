<?php
include 'config/db.php';
$username = '';
if (!empty($_GET['username'])) 
{
    $username = $_GET['username'];
}
$sql = "select * from student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div style="background-color: aqua; height: 100px;">
        <div style="margin-left: 40%; width: fit-content; font-size: 24px; padding-top: 20px;">
            <b>Welcome to Dashboard</b>
        </div>
        <div style="width: 100px; float: right; color: black;">
            <div>
                <?php echo $username; ?>
            </div>
            <div>
                <a href="http://localhost/crud/index.html">Logout</a>
            </div>
        </div> 
    </div>
    <div style="margin-top: 100px; width: 30%; margin-left: 30%; height: 100px;">
        <table style="border-collapse: collapse;">
            <th>id</th>
            <th>rollno</th>
            <th>f_name</th>
            <th>l_name</th>
            <th>gender</th>
            <th>fee</th>
            <th colspan="2">crud operations</th>
            <?php
                if ($result->rowCount() > 0)
                {
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) 
                    {
            ?>
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["rollno"];?></td>
                <td><?php echo $row["f_name"];?></td>
                <td><?php echo $row["l_name"];?></td>
                <td><?php echo $row["gender"];?></td>
                <td><?php echo $row["fee"];?></td>
                <td><a href="http://localhost/crud/edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
                <td><a href="http://localhost/crud/edit.php?id=">Delete</a></td>
            </tr>
            <?php
                }
                }
            ?>
        </table>
        <br><br>
        <div class="controls">
                <a class="btn btn-default" href="edit.php?add=1">Add New</a>
        </div>
    </div>
    <script src="" async defer></script>
</body>