<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Sign UPt</title>
    <style>
        .form{
            width: 230px;
            height: 280px;
        }
    </style>
</head>
<body>
<div>    
    <a class="home" href="index.html"><button class="b-home">Home</button></a>
</div>

        <?php
            require('./conection.php');
            if (isset($_POST['login_button'])) {
                $_SESSION['validate']=false;
                $name=$_POST['name'];
                $password=$_POST['password'];
                $p=crud::conect()->prepare('SELECT * FROM studenttable WHERE name=:n and pass=:p');
                $p->bindValue(':n',$name);
                $p->bindValue(':p',$password);
                $p->execute();
                $d=$p->fetchAll(PDO::FETCH_ASSOC);
                
                    if ($p->rowCount()>0) {
                        $_SESSION['name']=$name;
                        $_SESSION['pass']=$password;
                        $_SESSION['validate']=true;
                        header('location:./Students_Information_nextdata.php');
                    }else {
                        echo'Make sure that you are registered!';
                    }
                }
        
        ?>
        <?php
            require('./userconection.php');
            if (isset($_POST['Userlogin_button'])) {
                $_SESSION['validate']=false;
                $username=$_POST['username'];
                $password=$_POST['password'];
                $p=cruduser::conect()->prepare('SELECT * FROM studentuser WHERE username=:n and userpass=:p');
                $p->bindValue(':n',$username);
                $p->bindValue(':p',$password);
                $p->execute();
                $d=$p->fetchAll(PDO::FETCH_ASSOC);
                
                    if ($p->rowCount()>0) {
                        $_SESSION['username']=$username;
                        $_SESSION['userpass']=$password;
                        $_SESSION['validate']=true;
                        header('location:./Students_Information.php');
                    }else {
                        echo'Make sure that you are registered!';
                    }
                }
        
        ?>
    <div class="form">
        <div class="title">
            <p>Admin Login form</p>
        </div>
        <form action="" method="post" autocapitalize="off | none | on | sentences | words | characters">
            <input type="text" name="name" placeholder="Admin Name">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" name="login_button"> 
            <!-- <a href="./signUP.php" style="position:relative; left:50px;top:-8px; font-size:14px">Click here to sign up</a> -->
        </form>
    </div>
    
    <div class="form1">
        <div class="title1">
            <p>User Login form</p>
        </div>
        <form action="" method="post" autocapitalize="off | none | on | sentences | words | characters">
            <input type="text" name="username" placeholder="User Name">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" name="Userlogin_button"> 
            <a href="./studentSignUP.php" style="position:relative; left:50px;top:-8px; font-size:14px">Click here to sign up</a>
        </form>
    </div>
</body>
</html>