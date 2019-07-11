<?php
session_start();
include 'Connection.php';
$connection = new Connection;

$result = $connection->getAll("SELECT * FROM task WHERE status='completed'",null);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Completed Task</title>
</head>
<body>
    
    <h3>Completed Tasks</h3>
    
    <table border="1">
        <tr>
            <td>id</td>
            <td>task</td>
            <td>status</td>
       
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
        
            <td><a href="delete.php?id=<?php echo $id ?>">Delete</a></td>
            
          
        </tr>
            
            
        <?php } ?>
        
        
    </table>
    
    <hr>
    
    <a href="index.php">Home</a>
  
    <a href="logout.php">Logout</a>
    
</body>
</html>