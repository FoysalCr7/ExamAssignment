<?php
session_start();
include 'Connection.php';
$connection = new Connection;


if(!isset($_SESSION['logged_id'])){
    header("location:login.php");
    
}else{
    $user = $_SESSION['logged_id'];
}


$result = $connection->getAll("SELECT * FROM task WHERE status = 'incomplete'",null);



if(isset($_POST['addTask'])){
    $task = $_POST['task'];
    
    $array = array(
    ':task'=>$task,
        ':status'=>'incomplete'
    );
    $connection->update("INSERT INTO task(task,status) VALUES(:task,:status)",$array);
     
    header("location:index.php");
}



if(isset($_GET['status'])){
    $the_id = $_GET['id'];
    $status = $_GET['status'];
    
    $array = array(
    ':status'=>'completed'
    );
    
    $connection->update("UPDATE task SET status = :status WHERE id=$the_id",$array);
        header("location:index.php");

    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
   
   <h3><?php echo "Hello $user" ?></h3>
   
    <form action="" method="post">
       <label for="task">Task Name</label>
        <input type="text" name="task" id="task" required><br>
        
        <input type="submit" value="Add Task" name="addTask">
    </form>
    
    
    <hr>
    <hr>
    
    <table border="1">
        <tr>
            <td>id</td>
            <td>task</td>
            <td>status</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        
        <?php
        foreach($result as $res){
            $id = $res['id'];
            $task = $res['task'];
            $status = $res['status'];
        ?>
            
            <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $task ?></td>
            <td><?php echo $status ?></td>
            <td><a href="edit.php?id=<?php echo $id ?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $id ?>">Delete</a></td>
            <td><a href="index.php?id=<?php echo $id ?>&status=<?php echo $status ?>">Mark as Complete</a></td>
          
        </tr>
            
            
        <?php } ?>
        
        
    </table>
    
    
    <a href="Completed.php">View completed task</a>
    
    <hr>
    
    <a href="logout.php">Logout</a>
    
    
</body>
</html>


























