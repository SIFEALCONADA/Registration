<?php

include "conn.php";
session_start();

//This code is for registration

if(isset($_POST['reg'])){



    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];


        //validate email / user
        $validate_email= mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        $validate_num= mysqli_num_rows($validate_email);

        if($validate_num <= 0){

            $insert = mysqli_query($conn, "INSERT INTO users VALUES('0','$name','$email','$password')");

            if($insert == true){
                ?>
                
                <script>
                  alert("Registration Successfully Accepted!");
                  window.location.href="index.php";
                  </script>
                  <?php

            
            }else{
                ?>
                <script>
                    alert("Error in Registration!");
                    window.location.href="reg.php";
                    </script>
                    <?php
            }

        }else{
            ?>
            <script>
                alert("Account already Registered!");
                window.location.href="reg.php";
                </script>
                <?php
        }


    }


    //this code is for login
    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $check = mysqli_query($conn, "SELECT * FROM  users WHERE email='$email' AND password = '$password'");
        $n = mysqli_num_rows($check);
       
        if($n >= 1){
            ?>
                
            <script>
              alert("Login Successfully!");
              window.location.href="reg.php";
              </script>
              <?php

        
        }else{
            ?>
            <script>
                alert("Wrong Email or Password!");
                window.location.href="index.php";
                </script>
                <?php
        }


    }
    


?>