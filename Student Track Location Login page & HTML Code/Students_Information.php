<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Info</title>
    <link rel="stylesheet" href="Students_Information.css">
</head>
<body>
    <?php
        require('./conection.php');
        if (isset($_POST['submit_data'])) {
            $Batch=$_POST['Batch'];
            $Sl_No=$_POST['Sl_No'];
            $Register_Number=$_POST['Register_Number'];
            $Name=$_POST['Name'];
            $Date_of_Birth=$_POST['Date_of_Birth'];
            $Gender=$_POST['Gender'];
            $Email=$_POST['Email'];
            $Student_Mobile_No=$_POST['Student_Mobile_No'];
            $Blood_Group=$_POST['Blood_Group'];
            $Address=$_POST['Address'];
            $Father_Name=$_POST['Father_Name'];
            $Father_Occuption=$_POST['Father_Occuption'];
            $Mother_Name=$_POST['Mother_Name'];
            $Parent_Mobile_No=$_POST['Parent_Mobile_No'];
            $Annual_Family_Income=$_POST['Annual_Family_Income'];
           if (!empty($_POST['Batch'])&& !empty($_POST['Sl_No'])&& !empty($_POST['Register_Number'])&&!empty($_POST['Name'])&&!empty($_POST['Date_of_Birth'])&&!empty($_POST['Gender'])&&!empty($_POST['Email'])&&!empty($_POST['Student_Mobile_No'])&&!empty($_POST['Blood_Group'])&&!empty($_POST['Address'])&&!empty($_POST['Father_Name'])&&!empty($_POST['Father_Occuption'])&&!empty($_POST['Mother_Name'])&&!empty($_POST['Parent_Mobile_No'])&&!empty($_POST['Annual_Family_Income'])) {
               $p=crud::conect()->prepare('INSERT INTO studentinfo(Batch,Sl_No,Register_Number,Name,Date_of_Birth,Gender,Email,Student_Mobile_No,Blood_Group,Address,Father_Name,Father_Occuption,Mother_Name,Parent_Mobile_No,Annual_Family_Income) VALUES(:b,:s,:r,:n,:d,:g,:e,:sm,:bg,:a,:f,:fo,:m,:p,:af)');
               $p->bindValue(':b', $Batch);
               $p->bindValue(':s', $Sl_No);
               $p->bindValue(':r', $Register_Number);
               $p->bindValue(':n',$Name);
               $p->bindValue(':d',$Date_of_Birth);
               $p->bindValue(':g',$Gender);
               $p->bindValue(':e',$Email);
               $p->bindValue(':sm',$Student_Mobile_No);
               $p->bindValue(':bg',$Blood_Group);
               $p->bindValue(':a',$Address);
               $p->bindValue(':f',$Father_Name);
               $p->bindValue(':fo',$Father_Occuption);
               $p->bindValue(':m',$Mother_Name);
               $p->bindValue(':p',$Parent_Mobile_No);
               $p->bindValue(':af',$Annual_Family_Income);
               $p->execute();
               echo 'User Add successfully!';
            /*if ($password== $confPassword) {
                $p=crud::conect()->prepare('INSERT INTO studenttable(name,lastName,email,pass) VALUES(:n,:l,:e,:p)');
                $p->bindValue(':n', $name);
                $p->bindValue(':l', $lastName);
                $p->bindValue(':e', $email);
                $p->bindValue(':p',$password);
                $p->execute();
                echo 'User added successfully!';
            }else{
                echo 'Password does not match!';
            }*/
           }
        }

    ?>
    <div class="title">
        <h1>Students Information</h1>
    </div>
    <div class="form">
    <form action="" method="post">
             <table id="update" class="update_table">
                
                <tr>
                    <th>Batch :</th> <td><input name="Batch" id="brc_data" type="text" placeholder="Enter Branch"></td>
                </tr>
              
                <tr>
                    <th>Sl No :</th> <td><input name="Sl_No" id="no_data" type="number" placeholder="Enter Sl No"></td>
                </tr>
                <tr>
                    <th>Register Number :</th> <td><input name="Register_Number" id="reg_data" type="text" placeholder="Enter Reg Num"></td>
                </tr>
                <tr>
                    <th>Name :</th> <td><input name="Name" id="name_data" type="text" placeholder="Enter Name"></td>
                </tr>
                <tr>
                    <th>Date of Birth :</th> <td><input name="Date_of_Birth" id="dob_data" type="date" placeholder="Enter DOB"></td>
                </tr>
                <tr>
                    <th>Gender :</th> <td><input name="Gender" class="gender_data" type="radio" value="Male" >Male <input name="Gender" class="gender_data" type="radio" value="Female">Female</td>
                </tr>
                <tr>
                    <th>Email ID :</th> <td><input name="Email" id="email_data" type="email" placeholder="Enter Email"></td>
                </tr>
                <tr>
                    <th>Student Mobile No :</th> <td><input name="Student_Mobile_No" id="sut_mob_data" type="text" placeholder="Enter Mobile Number"></td>
                </tr>
                <tr>
                    <th>Blood Group :</th> <td><input name="Blood_Group" id="bg_data" type="text" placeholder="Enter Blood Group"></td>
                </tr>
                <tr>
                    <th>Address :</th> <td><input name="Address" id="address_data" type="text" placeholder=" Enter Address"></td>
                </tr>
                <tr>
                    <th>Father Name :</th> <td><input name="Father_Name" id="fn_data" type="text" placeholder="Enter Father Name"></td>
                </tr>
                <tr>
                    <th>Father Occuption :</th> <td><input name="Father_Occuption" id="fo_data" type="text" placeholder="Enter Father Occuption"></td>
                </tr>
                <tr>
                    <th>Mother Name :</th> <td><input name="Mother_Name" id="mn_data" type="text" placeholder="Enter Mother Name"></td>
                </tr>
                <tr>
                    <th>Parent Mobile No :</th> <td><input name="Parent_Mobile_No" id="par_mob_data" type="tel" placeholder="Enter Mobile Number"></td>
                </tr>
                <tr>
                    <th>Annual Family Income :</th> <td><input name="Annual_Family_Income" id="income_data" type="number" placeholder="Enter Income"></td>
                </tr>
                <tr>
                    <div >
                        <td></td> <td><input type="submit" value="Submit" name="submit_data"> </td>
                    </div>
                </tr>
             </table>


            </form>
          
    </div>
    <hr>

    <div>
        <a class="signout1" href="./login.php">Sign Out</a>
    </div>
    
    <!-- <div class="database">    
    <a href="Students_Information_nextdata.php"><button>Next Students DataBase</button></a>
    </div>  -->
     
        
   <script src="Students_Information.js"></script> 
</body>
</html>