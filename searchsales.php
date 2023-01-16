<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<html>
    <head>
        <title>Saledetails </title>
        <style>

            body {
  margin: 0;
  /* font-family: Arial, Helvetica, sans-serif; */
  /* background: #484848; */
  background-image: url("../demo4.webp"); 
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
  background-color: rgba(249, 105, 14, 1);
  height: 70px;
  border: 3px solid #e69500;
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
    outline:#e69500 solid 5px;
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
    background-color:rgba(249, 105, 14, 1);
}


.custombutton{
  margin:25px;
  text-align: center;
}

input[type=text] {
  width:auto;
  padding: 12px 20px;
  margin-top:25px;
  margin-left:142px;
  border: 2px;
  background-color:#FFD580;
  color:#000000; 
  border-radius: 15px;
  border: 3px solid #e69500;
}
    </style>    
</head>
<body>
<div class="topnav">
            <a class="active" href="home.html"><img src="../ic_add_pet.png"></a>
            <a href="sales.php">Sales Details</a>
            <div class="topnav-right">
              <a href="../sales.php">Back</a>
            </div>
          </div>
          
<?php

$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}

$search_sales=$_POST["t1"];
// $var=mysqli_query($con,"select * from sales_details where date='$search_sales' ");
$var=mysqli_query($con,"select S.sd_id, S.cs_id, S.date, S.total from sales_details S where date='$search_sales'" );

echo "<table border size=10>";
echo "<tr>
<th>Sales ID</th>
<th>Customer ID</th>
<th>Date</th>
<th>Total</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

$total=$_POST["t1"];
$var=mysqli_query($con,"select sum(total) as total_of_the_day from sales_details where date='$total'");
echo"<table border size=10>";
echo "<tr>
<th>Total profit of the day</th>
</tr>";

if(mysqli_num_rows($var)>0){
  while($arr=mysqli_fetch_row($var))
  { echo "<tr>
  <td>$arr[0]</td>
  </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}


mysqli_close($con);
    
    
?>
 

</body>
</html>