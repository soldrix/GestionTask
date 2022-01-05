<?php

session_start();

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>validtask</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="img/promeo.png" width="30" height="30" alt="logoPromeo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <button type="button" class="btn btn-outline-primary" onclick="location.href='logout.php'">Deconnection</button>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="container-fluid d-flex  min-vh-100 flex-column">
        <div class="col-auto d-flex p-3 justify-content-around">
            <div class="input-group">
                <input id="TextTask" type="text" class="form-control h-100 ml-2" placeholder="Task name:" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="addTask()">Add</button>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Task name</th>
                    <th scope="col">Decline button</th>
                </tr>
                </thead>
                <tbody id="rowTable">
                <tr>
                    <td><input type="checkbox" class="status"></td>
                    <td>exemple</td>
                    <td class="deltask"><button  type="button" class="btndelete btn btn-outline-danger">delete</button></td>

                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
