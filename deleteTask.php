<?php
$task=!empty($_POST['task']) ? $_POST['task'] : NULL;//retrieves the name of the task

$conn = mysqli_connect('localhost', 'root', 'root', 'gestiontask');

$query="DELETE FROM task WHERE task . task_name = '$task'"; //delete the task in the database
$resultat = mysqli_query($conn, $query);
