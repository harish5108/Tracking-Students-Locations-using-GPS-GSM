<?php
    class cruduser{
        public static function conect()
        {
           try {
            $con=new PDO('mysql:localhost=3306; dbname=studenttrack','root','');
            return $con;
           } catch (PDOException $error1) {
                echo 'Something went wrong, with you conection!'.$error1->getMessage();
           }catch (Exception $error2){
                 echo 'Generic error!'.$error2->getMessage();
           }
        }
    }
    ?>