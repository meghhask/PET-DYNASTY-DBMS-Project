<?php
 session_start();
 if(isset($_SESSION['id']))
 {

 }
 else{
  echo"<script>location.href='userlogin.html'</script>";
 }
?>
<html>
    <head>
        <title>Petproducts </title>
        <style>
  body {
  margin: 0;
  /* font-family: Arial, Helvetica, sans-serif;
  background: #484848; */
  background-image: url("demo3.webp"); 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  /* color: whitesmoke; */
  backdrop-filter: blur(4px);
  width: 100%;
  height: 100%;
}
.topnav {
  overflow: hidden;
  background-color: #f44336;
  height: 70px;
  border: 3px solid #ff0000;
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
    outline: #ff0000 solid 5px;
    background: #FAFAFA;
    width: 80%;
    margin:5px auto;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th{
    background-color:#f44336;
}


.custombutton{
  margin:25px;
  text-align: center;
  
}

input[type=text] {
    width: auto;
    padding: 12px 20px;
    margin: 8px ;
    border: 2px;
    border-radius: 15px;
    background-color:#FFCCCB;
    margin-top:25px;
    margin-left:142px;
    border: 3px solid #ff0000;
  }        
            
    </style>     
</head>
<body>
<div class="topnav">
            <a class="active" href="userhome.html"><img src="ic_add_pet.png"></a>
            <a href="userpetproducts.php">Pets Products</a>
            <div class="topnav-right">
              <a href="userhome.html">Home</a>
            </div>
          </div>
<div class="custombutton">          
<form action="usersearch/usproduct.php" method="post">
    <input type="text" name="t1" style="width:auto; margin-left: 0px;" placeholder="Enter the product type" required >
    <input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;" type="submit" value="Search">
</form> 

</div>

    <?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from pet_products ");
echo "<table border size=10>";
echo "<tr>
<th>Pro. ID</th>
<th>Pro. Name</th>
<th>Pro Type</th>
<th>Cost</th>
<th>Belongs To</th>
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
<!-- <form action="deleteproducts.php" method="post">
    <input type="text" name="t1" placeholder="Enter the id to delete" required >
    <input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #ff0000;background-color:#f44336;color:#f2f2f2;font-size:17px;" type="submit" value="Delete">
</form>  -->

</body>
</html>