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
  background-image: url("demo4.webp"); 
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
    margin:5px auto ;
    
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
            <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="sales.php">Sales Details</a>
            <div class="topnav-right">
              <a href="home.html">Home</a>
            </div>
          </div>
          <div class="custombutton"> 
          
          <form action="search/searchsales.php" method="post">
<input  id="dbutton" type="text" name="t1" style="width: auto; margin-left: 0px;" placeholder="Enter the date to view sales" required >
<input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:15px;"type="submit" value="Search">
</form>    
      
<form>
<button style=" height: 50px;width: auto;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:14px; " formaction="salesadd.php">Add New Details</button>
<button  style="height: 50px;width: 110px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:14px;" formaction="salesupdate.php">Update Details</button>
<button  style="margin-left:200px; height: 50px;width: 110px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:14px;" formaction="soldproducts.php">Sold Products</button>
<button  style="height: 50px;width: 100px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:14px;" formaction="soldpets.php">Sold Pets</button>
</form>
</div>
<?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from sales_details ");
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

mysqli_close($con);
    
    
?>
<form action="deletesales.php" method="post">
<input  id="dbutton" type="text" name="t1" placeholder="Enter the Sales ID to delete" required >
<input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:15px;"type="submit" value="Delete">
</form> 

</body>
</html>