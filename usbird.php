<html>
    <head>
        <title>Birds </title>
        <style>
body {
  margin: 0;
  /* font-family: Arial, Helvetica, sans-serif; */
  /* background: #484848; */
  background-image: url("../demo9.jpg"); 
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
  background-color:rgba(44, 130, 201, 1);
  height: 70px;
  border: 3px solid #3333ff
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
    border-collapse: collapse;
    outline:#4d4dff solid 5px;
    background: #FAFAFA;
    width: 80%;
    margin:50px auto ;
    
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th{
  background-color:rgba(44, 130, 201, 1);
}


.custombutton{
  margin:25px;
  text-align: center;
  
}
input[type=text] {
    width: 15%;
    padding: 12px 20px;
    /* margin:8px  auto ; */
    margin-top:25px;
    margin-left:142px;
    border: 2px blue;
    border-radius: 15px;
    background:#ADD8E6;
    width: auto;
    border: 3px solid #3333ff;
}

 </style>
</head>
<body>
<div class="topnav">
            <a class="active" href="home.html"><img src="../ic_add_pet.png"></a>
            <a href="birds.php">Birds</a>
            <div class="topnav-right">
              <a href="../userbirds.php">Back</a>
            </div>
</div>

<?php
   
   $con = mysqli_connect("localhost","root","","Petshop_management");
   if(!$con)
   { 
   die("could not connect".mysql_error());
   }
   $pet_category=$_POST["t1"];
   $var=mysqli_query($con,"select P.pet_id,P.pet_category,A.type,A.noise, P.cost from pets P,birds A where P.pet_id=A.pet_id and P.pet_category='$pet_category' ");
   echo "<table border size=10>";
   echo "<tr>
   <th>Pet ID</th>
   <th>Bird Category</th>
   <th>Bird Type</th>
   <th>Noise Level</th>
   <th>Cost</th>
   </tr>";
   if(mysqli_num_rows($var)>0){
       while($arr=mysqli_fetch_row($var))
       { echo "<tr>
       <td>$arr[0]</td>
       <td>$arr[1]</td>
       <td>$arr[2]</td>
       <td>$arr[3]</td>
       <td>$arr[4]</td>
       </tr>";}
       echo "</table>";
       mysqli_free_result($var);
   }
   
   mysqli_close($con);
       
       
   ?>
</body>
</html>