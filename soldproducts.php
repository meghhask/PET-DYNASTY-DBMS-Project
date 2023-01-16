<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<!doctype html>
<html>
    <head>
        <title>Saledetails </title>
        <style>

            body {
  margin: 0;
  /* font-family: Arial, Helvetica, sans-serif; */
  background: #484848;
}
.topnav {
  overflow: hidden;
  background-color:rgba(249, 105, 14, 1);
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
  
}input[type=text] {
    width: 15%;
    padding: 12px 20px;
    margin-top:25px;
  margin-left:142px;
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
            <a href="soldproducts.php">Sold Products</a>
            <div class="topnav-right">
              <a href="sales.php">Back</a>
            </div>
          </div>
          <div class="custombutton">         
<form>
<button   style=" height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:15px;" formaction="soldpdadd.php">Add New Details</button>
</form>
</div>
<?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from sold_products ");
echo "<table border size=10>";
echo "<tr>
<th>Sales ID</th>
<th>Prod. Id</th>
<th>Quantity</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
<form action="deletesoldpd.php" method="post">
<input  type="text" name="t1" placeholder="Enter  Sales ID to delete" required>
<input   type="text" name="t2" style="margin-left: auto;" placeholder="Enter Product ID number" required>
    <input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:15px;"type="submit" value="Delete">
</form> 

</body>
</html>