<?php
session_start();
    $username=$_SESSION['username'];//retrieves username

    $text=!empty($_POST['text']) ? $_POST['text'] : NULL;//retrieves taskname



    $conn = mysqli_connect('localhost', 'root', 'root', 'gestiontask');

    $query="SELECT id FROM `users` WHERE (name='$username')";
    $resultat = mysqli_query($conn, $query);
    $resultat=mysqli_fetch_assoc($resultat);
     $id_user=$resultat['id'];
    $query ="INSERT into task (task_name,id_user)
              VALUES ('$text','$id_user')";
    $resultat = mysqli_query($conn, $query);




?>

