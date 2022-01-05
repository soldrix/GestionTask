<?php
$status=!empty($_POST['status']) ? $_POST['status'] : NULL;
$task=!empty($_POST['task']) ? $_POST['task'] : NULL;

$conn = mysqli_connect('localhost', 'root', 'root', 'gestiontask');

$query="UPDATE `task` SET `status` = '$status' WHERE (task_name = '$task')";
$resultat = mysqli_query($conn, $query);
