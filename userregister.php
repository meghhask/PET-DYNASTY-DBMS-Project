<?php 
    include 'dbconnection.php';
    error_reporting(0); 
    if(isset($_POST['reg_user']))
    {
        $name =$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $pswd1=$_POST['password'];
        $pswd2=$_POST['confirm_pswd'];

        // echo $name . $email .$phone .$pessword
        $error="";
        $sql1="select * from users";
        $result=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                if ( $row['email']==$email or $row['phone']==$phone)
                {
                    $error="1";
                    
                   
                }
            }
                if ($name=="" or $email=="" or $phone=="" or $pswd1=="" or $pswd2=="")
                {
                    $error="2";
                    
                   
                }
                elseif($pswd1!=$pswd2)
                {
                    $error="3";
                    
                    
                }
                elseif($error=="")
                {
                    $sql="INSERT INTO users VALUES('$name','$email','$phone','$pswd1',NULL)";
                    $q= mysqli_query($conn,$sql);
                    if ($q)
                    {
                        $error="Registerd Successfully";
                    }
                }
            
           
        }   
    }

?>

<html>
  <head>
    <title> User Register</title>
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
        /* padding: 8% 0 0; */
        margin: 50px 250px;
      }
      .form {
        position: relative;
        z-index: 1;
        background: #ffffff;
        max-width: 360px;
        margin-top:0px;
        /* margin: 0 auto 100px; */
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
      <a class="active" href="userlogin.php"><img src="ic_add_pet.png" /></a>
      <a href="userlogin.php">Pets Dynasty</a>
      <div class="topnav-right">
        <a href="mainhome.html">Home Page</a>
      </div>
    </div>
    <div class="login-page">
      <div class="form">
       <!-- <form class="login-form" action="userindex.php" method="POST">
          <h1>User Login</h1> -->
          <!-- <h2 class="active underlineHover"> Sign In </h2> -->
          

          <!-- <input type="text" name="name" placeholder="username" required />
          <input type="text" name="name" placeholder="username" required />
          <input type="text" name="name" placeholder="username" required />
          <input type="password" name="password" placeholder="password" required />
          <input type="text" name="name" placeholder="username" required />
          <button type="submit" name="login">Login</button>
          <h2 class="inactive underlineHover">Not a user? <a href="register11.php">Sign Up </h2></a>
        </form> -->

        <form action="userlogin.php" method="post">
        <h1>User Register</h1>
            <input type="text" id="name"  name="name" placeholder="name" required>
            <input type="text" id="email"  name="email" placeholder="email" required>
            <input type="text" id="phone"  name="phone" placeholder="phone no."required>
            <input type="password" id="password"  name="password" placeholder="password"required>
            <input type="password" id="confirm_pswd"  name="confirm_pswd" placeholder="confirm password"required>
            <input type="submit"  value="Register" id="reg_user" style="background-color: rgba(249, 105, 14, 1); color:#f2f2f2;" name="register">
            <!-- <button type="submit">Register</button> -->
            <!-- <button type="submit"  value="register" id="reg_user" name="register">Register</button> -->
        </form>

        <?php
        
        if($error=="1"){
            echo "<h2>user already exixts</h2>";
            $error="";
        }
        elseif($error=="2"){
            echo "<h2> Fields cannot be empty</h2>";
            $error="";
        }
        elseif($error=="3"){
            echo "<h2>Passwords do not match</h2>";
            $error="";
        }
        elseif($error=="0"){
            $temp="<h2>Registerd successfully <a href=\"userlogin.php\"></a></h2>";
            echo $temp;
            $error="";
        }
        echo $error;
    
        
        ?>

      </div>
    </div>
  </body>
</html>
