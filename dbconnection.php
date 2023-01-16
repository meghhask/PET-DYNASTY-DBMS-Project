<?php

    $dbcon = mysqli_connect('localhost','root','','petshop_management');

    if($dbcon==false)
    {
        echo "Database is not Connected!";
    }
   
?>