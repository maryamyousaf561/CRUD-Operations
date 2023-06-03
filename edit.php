<?php
include 'config/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$row = array('rollno' => '', 'f_name' => '', 'l_name' => '', 'gender' => '', 'fee' => '',);
$add='';
$edit='';
$id='';
$update_id='';
$delete='';
if (!empty($_GET['add'])) 
{
    $add = 1;
}
if (!empty($_GET['edit'])) 
{
    $edit = 1;
}
if (!empty($_GET['id'])) 
{
    $id = $_GET['id'];
}
if (!empty($_GET['rollno'])) {
    $form_data = 1;
    $rollno = !empty($_GET['rollno']) ? $_GET['rollno'] : '';
    $f_name = !empty($_GET['f_name']) ? $_GET['f_name'] : '';
    $l_name = !empty($_GET['l_name']) ? $_GET['l_name'] : '';
    $gender = !empty($_GET['gender']) ? $_GET['gender'] : '';
    $fee = !empty($_GET['fee']) ? $_GET['fee'] : '';
}
if ($add) 
{
    if (!empty($_GET['rollno'])) 
    {
        // Adding a new record form
    }
}
if ($edit) 
{
    if (!empty($_GET['rollno'])) 
    {
        // Updating a new record with form
    }
}
if($delete)
{
    if (!empty($_GET['rollno'])) 
    {
        // Deleting a  record with form
    }
}
if ($id) 
{
    $sql = "select * from student where id=" . $id;
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) 
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
    }
}
// run for add /edit form
if (!empty($_GET['rollno'])) 
{
    $rollno = !empty($_GET['rollno']) ? $_GET['rollno'] : '';
    $f_name = !empty($_GET['f_name']) ? $_GET['f_name'] : '';
    $l_name = !empty($_GET['l_name']) ? $_GET['l_name'] : '';
    $gender = !empty($_GET['gender']) ? $_GET['gender'] : '';
    $fee = !empty($_GET['fee']) ? $_GET['fee'] : '';
}
$sql = '';
// Add new Record
if (!empty($_GET['add']) && !empty($_GET['rollno'])) 
{
    $sql = "insert into student (rollno, f_name, l_name, gender, fee) Values ('" . $rollno . "','" . $f_name . "','" . $l_name . "','" . $gender . "','" . $fee . "')";
} elseif (!empty($_GET['edit'])) 
{
    $sql = "update student SET f_name='" . $f_name . "', l_name='" . $l_name . "', gender='" . $gender . "', fee='" . $fee . "' where id=" . $update_id;
}
if ($sql) 
{
    $result = $conn->mysqlquery($sql);
    if (!empty($_GET['add']) && $result) 
    {
        $id = $conn->$mysqli->insert_id;
        echo "Added Succefully";
    } 
    elseif (!empty($_GET['edit']) && $result) 
    {
        $id = $_GET['id'];
        echo "Updated Succesfully";
    }
} 
else 
{
    //dashboard edit link
    $id = !empty($_GET['id']) ? $_GET['id'] : '';
}
// read data
if ($id) 
{
    $sql = "select * from student where id=" . $id;
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) 
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
    }
}
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
            <b>Crud Operations form</b>
        </div>
        <div style="width: 100px; float: right; color: black;">
            <div>
                <a href="http://localhost/crud/index.html">Logout</a>
            </div>
        </div> 
    </div>
    <div class="formbox">
        <form>
            <div class="formfield">
                <lable>Roll Number:</label><br>
                <input style="width: fit-content;" type="text" name="rollno" value=" <?php echo $row["rollno"];?> " />
            </div>
            <div class="formfield">
                <lable>First Name:</label><br>
                <input style="width: fit-content;" type="text" name="f_name" value="<?php echo $row['f_name']; ?>" />
            </div>
            <div class="formfield">
                <lable>Last Name:</label><br>
                <input style="width: fit-content;" type="text" name="l_name" value="<?php echo $row['l_name']; ?>" />
            </div>

            <div class="formfield">
                <lable>Gender:</label><br>
                <input  style="width: fit-content;"type="text" name="gender" value="<?php echo $row['gender']; ?>" />
            </div>

            <div class="formfield">
                <lable>Fee:</label><br>
                <input style="width: fit-content;" type="text" name="fee" value="<?php echo $row['fee']; ?>" />
            </div>
            <br><br><br>
            <div class="field-group ib">
                <?php
                if (!empty($_GET['id'])) 
                {
                ?>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                    <input type="hidden" name="edit" value="1" />
                    <input type="submit" value="Update">
                    <?php
                } 
                else 
                {
                    ?>
                    <input type="hidden" name="add" value="1">
                    <input type="submit" value="Add">
                    <?php
                }
                ?>
            </div>
            <div class="field-group ib">
                <a class="btn btn-default" href="dashboard.php">Goto Dashboard</a>
            </div>
        </form>
    </div>
</body>