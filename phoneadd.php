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
        <title>Customer </title>
        <style>
            body {
  margin: 0;
  /* font-family: Arial, Helvetica, sans-serif; */
  background: #1f1926;
}
.topnav {
  overflow: hidden;
  background-color:#8d2663;
  height: 70px;
  border: 3px solid #b40a70;
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

.topnav-right a{
  float: right;
  font-size: 25px;
  padding: 20px 20px;
}
fieldset { 
  background: #FAFAFA;
	padding: 10px;
  margin:40px auto;
  max-width:450px;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #b40a70;


}


</style>    
</head>
<body>
<div class="topnav">
            <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="customer.php">Customer Phone No's to Add </a>
            <div class="topnav-right">
              <a href="phone.php">Back</a>
            </div>
          </div>
 
<form method="post" action="phoneadd.php"> 
<fieldset>  
   <input type="text" name="id" placeholder="Enter customer id" style="width:100%;height:30px;
    border: 2px solid #b40a70; border-radius:5px; background:transparent;" required>
  <br><br>
   <input type="number" name="phone" placeholder="Enter phone no." style="width:100%;height:30px;
    border: 2px solid  #b40a70; border-radius:5px; background:transparent;" required>
  <br><br>
  <input type="submit" name="submit" value="ADD" style="width:100px;height:30px;
    border: 2px solid  #b40a70; border-radius:5px; cursor:pointer;background-color: #8d2663">&ensp;  
  </fieldset> 
</form> 
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
 // define variables and set to empty values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Petshop_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "  CONNECTION ESTABLISHED \r\n";
//echo "  INSERTION IN PROCESS";
$id = $_POST["id"];
  $cs_phone = $_POST["phone"];
 




$sql = "INSERT INTO phone( cs_id,cs_phone)
VALUES ('$id','$cs_phone')";
if ($conn->query($sql) == TRUE) {
  echo'<div>
  <h1 style="color:#f2f2f2;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">New record of cs_id='
  .$id. ' inserted successfully</h1>
     </div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
