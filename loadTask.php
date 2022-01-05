<?php
session_start();
$user_id = $_SESSION['id_user'];//retrieves the id of the user

$conn = mysqli_connect('localhost', 'root', 'root', 'gestiontask');

$query="SELECT task_name FROM task WHERE (id_user='$user_id')"; //retrieves all task of the users
$resultat = mysqli_query($conn, $query);
$resultat=mysqli_fetch_all($resultat);

$id_user=$resultat;

echo json_encode($id_user)
?>
