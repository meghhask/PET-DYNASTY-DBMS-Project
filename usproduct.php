<html>
    <head>
        <title>Petproducts </title>
        <style>
  body {
  margin: 0;
  /* font-family: Arial, Helvetica, sans-serif; */
  /* background: #484848; */
  background-image: url("../demo3.webp"); 
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
    margin:50px auto;
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
  
}input[type=text] {
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
            <a class="active" href="home.html"><img src="../ic_add_pet.png"></a>
            <a href="petproducts.php">Pets Products</a>
            <div class="topnav-right">
              <a href="../userpetproducts.php">Back</a>
            </div>
          </div>

          <?php
   
   $con = mysqli_connect("localhost","root","","Petshop_management");
   if(!$con)
   { 
   die("could not connect".mysql_error());
   }
   $product_type=$_POST["t1"];
   $var=mysqli_query($con,"select * from pet_products where pp_type='$product_type' ");
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



</body>
</html>