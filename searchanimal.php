<html>
    <head>
        <title>Animals </title>
        <style>
body {
  margin: 0;
  /* font-family: Arial, Helvetica, sans-serif; */
  background-image: url("../demo6.jpg"); 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  /* color: whitesmoke; */
  backdrop-filter: blur(3px);
  width: 100%;
  height: 100%;
}

.topnav {
  overflow: hidden;
  background-color: #4CAF50;
  height: 70px;
  border: 3px solid green;
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
table {
    font-family: arial, sans-serif;
    border-collapse: collapse; outline: green solid 5px;
    background: #FAFAFA;
    margin:50px auto ;
    width:80%;
}

td, th {
    border: 2px solid #dddddd;
    text-align: left;
    padding: 8px;
    background-color:#f2f2f2;
    
}
th{
  background-color: #4CAF50;
}


.custombutton{
  margin:25px;
  text-align: center;
  
}input[type=text] {
    padding: 12px 20px;
    border-radius: 15px;
    color:#black;
    margin-top:25px;
    margin-left:142px;
    width: auto; 
    background-color:#90EE90;
    border: 3px solid green;
}

.button1{
  height: 50px;
  width: 150px;
  cursor:pointer;
  border-radius:15px;
  border: 3px solid green;
  background-color: #4CAF50;
  color:#f2f2f2;
  font-size:17px;
}

.button2{
  margin: auto; height: 50px;width: 150px;cursor:pointer;border-radius:15px;
  border: 3px solid green;background-color: #4CAF50;color:#f2f2f2;font-size:17px;
}




</style>
</head>
<body>
<div class="topnav">
            <a class="active" href="home.html"><img src="../ic_add_pet.png"></a>
            <a href="animals.php">Animals</a>
            <div class="topnav-right">
              <a href="../animals.php">Back</a>
            </div>
          </div>
          <?php
   
   $con = mysqli_connect("localhost","root","","Petshop_management");
   if(!$con)
   { 
   die("could not connect".mysql_error());
   }
   $pet_category=$_POST["t1"];
   $var=mysqli_query($con,"select P.pet_id,P.pet_category,A.breed,A.weight,A.height,A.age,A.fur,P.cost from pets P,animals 
   
   A where P.pet_id=A.pet_id and P.pet_category='$pet_category'");
   echo "<table border size=10>";
   echo "<tr>
   <th>Pet ID</th>
   <th>Pet Category</th>
   <th>Breed</th>
   <th>Weight (kg)</th>
   <th>Height (cm)</th>
   <th>Age (m)</th>
   <th>Fur Color</th>
   <th>Cost (Rs)</th>
   </tr>";
   if(mysqli_num_rows($var)>0){
       while($arr=mysqli_fetch_row($var))
       { echo "<tr>
       <td>$arr[0]</td>
       <td>$arr[1]</td>
       <td>$arr[2]</td>
       <td>$arr[3]</td>
       <td>$arr[4]</td>
       <td>$arr[5]</td>
       <td>$arr[6]</td>
       <td>$arr[7]</td>
       </tr>";}
       echo "</table>";
       mysqli_free_result($var);
   }
   
   mysqli_close($con);
       
       
   ?>

<?php