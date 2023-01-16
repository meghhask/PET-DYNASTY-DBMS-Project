<?php

require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
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
            //alert("Welcome🙏");
            window.open('userhome.html', '_self');
            // changes made here
        </script> <?php

                }
            }
?>

<html>
  <head>
    <title>Petshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
      body {
        margin: 0;
        background-image: url("pic2.webp");
        background-size: 100%;
      }
      .topnav {
        overflow: hidden;
        background-color: rgb(73, 25, 21);
        height: 70px;
        border: 2px solid black;
      }

      .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 35px;
        font-weight: bold;
      }

      .topnav-right a {
        float: right;
        font-size: 25px;
        padding: 20px 20px;
      }

      .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: 50px 250px;
      }
      .form {
        position: relative;
        z-index: 1;
        background: #ffffff;
        max-width: 360px;
        margin: 0 auto 100px;
        /* margin-left: 500px; */
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 8px 8px 0 #491915;
        border: 5px solid #491915;
        border-radius: 3px;
      }
      .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
      }
      .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: rgba(249, 105, 14, 1);
        width: 100%;
        border: 0;
        padding: 15px;
        color: #ffffff;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
      }
      .form button:hover,
      .form button:active,
      .form button:focus {
        background: rgba(249, 105, 14, 1);
      }

      .underlineHover{
        font-size:medium;
      }


    </style>
  </head>
  <body>
    <div class="topnav">
      <a class="active" href="userlogin.html"><img src="ic_add_pet.png" /></a>
      <a href="userlogin.html">Pets Dynasty</a>
      <div class="topnav-right">
        <a href="mainhome.html">Home Page</a>
      </div>
    </div>
    <div class="login-page">
      <div class="form">
        <form class="login-form" action="userindex.php" method="POST">
          <h1>User Login</h1>
          <!-- <h2 class="active underlineHover"> Sign In </h2> -->
          

          <input type="text" name="email" placeholder="Email" required />
          <input type="password" name="password" placeholder="password" required />
          <button type="submit" name="submit">Login</button>
          <h2 class="inactive underlineHover">Do not have an account? <a href="userregister.php">Sign Up </h2></a>
        </form>
      </div>
    </div>
  </body>
</html>
