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

$conn = mysqli_connect('localhost', 'root', 'root', 'gestiontask');
$succes=0;
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){


        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        error_log($username);

    $mail = mysqli_query($conn, "SELECT * FROM `users` WHERE mail = '" . $_POST['email'] . "'");
    if (mysqli_num_rows($mail)){
        $email_use=true;
    } else{
        $email_use=false;
    }

    $name = mysqli_query($conn,"SELECT * FROM `users` where name ='" . $_POST['username'] . "'");
    if (mysqli_num_rows($name)){
        $name_use=true;
    }else{
        $name_use=false;
    }

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    error_log($email);


    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    error_log($password);




if ($name_use==false && $email_use==false){
    $query ="INSERT into `users` (name, mail, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
    $resultat = mysqli_query($conn, $query);

    if($resultat){
        $succes=1;
        $mailUtiliser=2;
        $User_utiliser=2;
        echo "
     <form class='boite' action='login.php' method='post'>
         <h3 id='succes'>Vous êtes inscrit avec succès.</h3>
        
        <button class='redirection btn' onclick='Redirection'>Se connecter</button>
    
    
    </form>";

    }else{
        $succes=3;
    }
}


}?>
<?php if ($succes==0){?>
    <form class="form-signin d-flex flex-column">
        <img class="mb-4 align-self-center" src="img/promeo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Create account</h1>
        <input type="text" id="inputName" class="form-control mb-1 rounded" name="username" placeholder="Your name" required autofocus>
        <input type="email" id="inputEmail" class="form-control mb-1 rounded" name="email" placeholder="Email address" required autofocus>
        <input type="password" id="inputPassword" class="form-control rounded" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-2 text-center">Already signed up?<a href="login.php" class="ml-1">sign in</a></p>
    </form>
<?php }?>
<?php if ($succes==3){ ?>
    <form class="form-signin d-flex flex-column">
        <img class="mb-4 align-self-center" src="img/promeo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Create account</h1>
        <input type="text" id="inputName" class="form-control mb-1 rounded" name="username" placeholder="Your name" required autofocus>
        <?php if ($name_use==true){?>
            <p class="mt-2 text-center">This name is already use.</p>
        <?php } ?>
        <input type="email" id="inputEmail" class="form-control mb-1 rounded" name="email" placeholder="Email address" required autofocus>

        <?php if ($email_use==true){?>
            <p class="mt-2 text-center">This mail is already register.</p>
        <?php } ?>
        <input type="password" id="inputPassword" class="form-control rounded" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    </form>

<?php }?>
</body>
</html>
