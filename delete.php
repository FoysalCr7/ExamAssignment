<?php
include 'Connection.php';
$connection = new Connection;

$the_id = $_GET['id'];


$connection->update("DELETE FROM task WHERE id=$the_id",null);

    header("location:index.php");



?>