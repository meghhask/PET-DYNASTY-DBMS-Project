 <!-- <?php
// session_start();
//echo"<script>alert('welcome')</script>";
// if($_POST["name"]=="username" &&$_POST["password"]=="pswd")
// {
    //  $_SESSION['user1']="pavanchikka";
    // $con = mysqli_connect("localhost","root","","petshop_management");
// if(!$con)
// { 
// die("could not connect database".mysql_error());
// }
  
// else
// {
//     echo"<script>location.href='userhome.html'</script>";
// }
// }

// else
// {
//      echo"<script>alert('invaild username or password')</script>";
//     echo"<script>location.href='login.html'</script>";
// }

?> -->



<?php

require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `users` WHERE `email`='$email' AND `pswd`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
?>
        <script>
            alert("Opps! Please Enter Your Details again");
            window.open('userindex.php', '_self');
        </script> <?php
                } else {
                    $data = mysqli_fetch_assoc($run);
                    $id = $data['id'];    //fetch id value of user
                    $email = $data['email'];
                    $_SESSION['id'] = $id;   //now we can use it until session destroy
                    $_SESSION['email'] = $email;
                    ?>
        <script>
            alert("Welcome🙏");
            window.open('userhome.html', '_self');
            // changes made here
        </script> <?php

                }
            }
?>