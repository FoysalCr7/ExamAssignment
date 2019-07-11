<?php
include 'Connection.php';
$connection = new Connection;

$id = $_GET['id'];
$result = $connection->getAll("SELECT * FROM task WHERE id=$id",null);
foreach($result as $res){
            $id = $res['id'];
            $task = $res['task'];
            $status = $res['status'];
}
if(isset($_POST['taskUpdate'])){
    $task = $_POST['task'];
    $status = $_POST['status'];
    
    $array = array(
    ':task'=>$task,
        ':status'=>$status
    );
    $connection->update("UPDATE task SET task = :task, status = :status
WHERE id=$id",$array);
     
    header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
</head>
<body>
    <form action="" method="post">
       <label for="task">Name</label>
        <input type="text" name="task" id="task" value="<?php echo $task ?>" required><br>
        <label for="status">status</label>
        <input type="text" name="status" id="status" value="<?php echo $status ?>" required><br>
        
        <input type="submit" value="Update" name="taskUpdate">
    </form>
</body>
</html>