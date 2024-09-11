<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign.css">
    <title>Sign UPt</title>
</head>
<body>
    <?php
        require('./conection.php');
        if (isset($_POST['signUP_button'])) {
            $username=$_POST['username'];
            $userlastName=$_POST['userlastName'];
            $useremail=$_POST['useremail'];
            $password=$_POST['password'];
            $confPassword=$_POST['confiPassword'];
           if (!empty($_POST['username'])&& !empty($_POST['userlastName'])&& !empty($_POST['useremail'])&&!empty($_POST['password'])) {
            if ($password== $confPassword) {
                $p=crud::conect()->prepare('INSERT INTO studentuser(username,userlastName,useremail,userpass) VALUES(:n,:l,:e,:p)');
                $p->bindValue(':n', $username);
                $p->bindValue(':l', $userlastName);
                $p->bindValue(':e', $useremail);
                $p->bindValue(':p',$password);
                $p->execute();
                echo 'User added successfully!';
            }else{
                echo 'Password does not match!';
            }
           }
        }

    ?>
    <div class="form">
        <div class="title">
            <p>User Sign UP form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="username" placeholder="User Name">
            <input type="text" name="userlastName" placeholder="Last name">
            <input type="email" name="useremail" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confiPassword" placeholder="Confrim password">
            
            <input type="submit" value="Sign UP" name="signUP_button"> 
            <a href="./login.php">Do you have account? Sign in</a>
        </form>
    </div>
</body>
</html>