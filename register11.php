<?php 
    include 'connection.php';
    error_reporting(0); 
    if(isset($_POST['register']))
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&family=Quicksand&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&family=Quicksand&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&family=Quicksand&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <title>REGISTER</title>

    <!-- css -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');

        /* BASIC */


        /* html {
            background-color: #56baed;
        } */

        body {
            font-family: "Poppins", sans-serif;
            height: 100vh;
            margin: 0%;
            position: relative;
            background-image: url(main.jpg);
        }

        a {
            color: #92badd;
            display: inline-block;
            text-decoration: none;
            font-weight: 400;
        }

        h2 {
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
            margin: 40px 8px 10px 8px;
            color: #cccccc;
        }


        /* STRUCTURE */

        .wrapper {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: 100%;
            padding: 20px;
        }

        #formContent {
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 10px 10px 10px 10px;
            background: rgba(255, 255, 255, 0.767);
            padding: 30px;
            width: 90%;
            max-width: 450px;
            position: relative;
            padding: 0px;
            -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        #formFooter {
            background-color: #f6f6f6c5;
            border-top: 1px solid #dce8f1;
            padding: 25px;
            height: 30px;
            text-align: center;
            -webkit-border-radius: 0 0 10px 10px;
            border-radius: 0 0 10px 10px;
        }


        /* TABS */

        h2.inactive {
            color: #cccccc;
        }

        h2.active {
            color: #0d0d0d;
            border-bottom: 2px solid #5fbae9;
        }


        /* FORM TYPOGRAPHY*/

        input[type=button],
        input[type=submit],
        input[type=reset] {
            background-color: #56baed;
            border: none;
            color: white;
            padding: 15px 80px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            font-size: 13px;
            -webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
            box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin: 5px 20px 40px 20px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        input[type=button]:hover,
        input[type=submit]:hover,
        input[type=reset]:hover {
            background-color: #39ace7;
        }

        input[type=button]:active,
        input[type=submit]:active,
        input[type=reset]:active {
            -moz-transform: scale(0.95);
            -webkit-transform: scale(0.95);
            -o-transform: scale(0.95);
            -ms-transform: scale(0.95);
            transform: scale(0.95);
        }

        input[type=text] {
            background-color: #f6f6f6;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px;
            width: 85%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
        }

        input[type=text]:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type=text]:placeholder {
            color: #cccccc;
        }

        input[type=password] {
            background-color: #f6f6f6;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px;
            width: 85%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
        }

        input[type=password]:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type=password]:placeholder {
            color: #cccccc;
        }


        /* ANIMATIONS */


        /* Simple CSS3 Fade-in-down Animation */

        .fadeInDown {
            -webkit-animation-name: fadeInDown;
            animation-name: fadeInDown;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        @-webkit-keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }


        /* Simple CSS3 Fade-in Animation */

        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @-moz-keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fadeIn {
            opacity: 0;
            -webkit-animation: fadeIn ease-in 1;
            -moz-animation: fadeIn ease-in 1;
            animation: fadeIn ease-in 1;
            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-duration: 1s;
            -moz-animation-duration: 1s;
            animation-duration: 1s;
        }

        .fadeIn.first {
            -webkit-animation-delay: 0.4s;
            -moz-animation-delay: 0.4s;
            animation-delay: 0.4s;
        }

        .fadeIn.second {
            -webkit-animation-delay: 0.6s;
            -moz-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        .fadeIn.third {
            -webkit-animation-delay: 0.8s;
            -moz-animation-delay: 0.8s;
            animation-delay: 0.8s;
        }

        .fadeIn.fourth {
            -webkit-animation-delay: 1s;
            -moz-animation-delay: 1s;
            animation-delay: 1s;
        }


        /* Simple CSS3 Fade-in Animation */

        .underlineHover:after {
            display: block;
            left: 0;
            bottom: -10px;
            width: 0;
            height: 2px;
            background-color: #073e5a;
            content: "";
            transition: width 0.2s;
        }

        .underlineHover:hover {
            color: #0d0d0d;
        }

        .underlineHover:hover:after {
            width: 100%;
        }


        /* OTHERS */

        *:focus {
            outline: none;
        }

        #icon {
            width: 60%;
        }

        * {
            box-sizing: border-box;
        }

        p {
            font-family: 'Source Sans Pro', sans-serif;
        }

        .header {
            height: 80px;
            width: 100%;
            background: rgb(179, 179, 186);
            background: linear-gradient(90deg, rgba(179, 179, 186, 1) 0%, rgba(0, 0, 0, 1) 0%, rgba(44, 51, 54, 0.2945553221288515) 100%);
            position: absolute;
            top: -20px;
        }
        h1{
            color: white;
            font-family: 'Heebo', sans-serif;
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>
<body>


<div class="header">
    <h1>EBOOK MANAGEMENT SYSTEM</h1>
</div>

<div class="wrapper fadeInDown">
    <div id="formContent">

        <h2 class="active"> Sign up </h2>
        <h2 class="inactive underlineHover"> <a href="login.php"> Sign in</a> </h2>

        
        <div class="fadeIn first">
            <p>REGISTER PAGE</p>
        </div>

       
        <form action="register.php" method="post">
            <input type="text" id="name" class="fadeIn second" name="name" placeholder="name" required>
            <input type="text" id="email" class="fadeIn third" name="email" placeholder="email" required>
            <input type="text" id="phone" class="fadeIn third" name="phone" placeholder="phone no."required>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password"required>
            <input type="password" id="confirm_pswd" class="fadeIn third" name="confirm_pswd" placeholder="confirm password"required>
            <input type="submit" class="fadeIn fourth" value="register" id="reg_user" name="register">
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
            $temp="<h2>registerd successfully <a href=\"login.php\"></a></h2>";
            echo $temp;
            $error="";
        }
        echo $error;
    
        
        ?>

        
        <div id=" formFooter ">
            <a class="underlineHover " href="about.html ">about us &nbsp;&nbsp;</a>
            <a class="underlineHover " href="contactus.html ">contact us</a>
        </div>

    </div>
</div>

</body>
</html>