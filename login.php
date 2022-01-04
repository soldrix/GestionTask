
<!DOCTYPE html>
<html>
<head>
    <title>validtask</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<?php
session_start();

$conn = mysqli_connect('localhost', 'root', 'root', 'gestiontask');
if (isset($_POST['username'])){
    echo "good";
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE mail='$username' and password='".hash('sha256', $password)."'";
//    $query = "SELECT * FROM `users` WHERE mail='test@gmail.com'";

    $result = mysqli_query($conn,$query);
    $donner=$result->fetch_array();
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['username'] =$donner['name'];
        header("Location: index.php");
    }else{
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
}
?>
    <form class="form-signin d-flex flex-column" method="post">
        <img class="mb-4 align-self-center" src="img/promeo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <input type="email" id="inputEmail" class="form-control mb-1 rounded" name="username" placeholder="Email address" required autofocus>
        <input type="password" id="inputPassword" class="form-control rounded" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p>Are you new here? <a href="register.php">sign up</a></p>
        <?php if (! empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
    </form>
</body>
</html>

