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
        <title>Birds </title>
        <style>
body {
  margin: 0;
  /* font-family: Arial, Helvetica, sans-serif; */
  background: #01062e;
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

fieldset { 
	background: #FAFAFA;
	padding: 10px;
  margin:40px auto;
  max-width:300px;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid  rgba(44, 130, 201, 1);


}



 </style>
</head>
<body>
<div class="topnav">
            <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="birds.php">Bird to Add</a>
            <div class="topnav-right">
              <a href="birds.php">Back</a>
            </div>
</div>

 
<form method="post" action="birdsadd.php">  
<fieldset>
  <input type="text" name="id" placeholder=" Enter Pet ID" style="width:98%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;"  required>
  <br><br>
   <input type="text" name="category" placeholder=" Enter Bird Category"  style="width:98%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;"  required>
  <br><br>
   <input type="text" name="type" placeholder=" Enter Bird Type"  style="width:98%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;"  required>
  <br><br>
  <select name="noise" placeholder="Noise level" style="width:99%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;">
  <option value="low">Low</option>
  <option value="moderate">Moderate</option>
  <option value="high">High</option>
</select>
  <br><br>
  <input type="number" name="cost" placeholder=" Enter cost"  style="width:98%;height:30px;
   border: 2px solid  rgba(44, 130, 201, 1); border-radius:3px;  background:transparent;"  min="0" required>
  <br><br>
  <input type="submit" name="submit" value="Save" style="width:100px;height:30px; margin: 0 400px ;
   border: 2px solid  #01062e; border-radius:3px; cursor:pointer;background-color:rgba(44, 130, 201, 1)">&ensp; 
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
  $category = $_POST["category"];
  $type= $_POST["type"];
  $noise = $_POST["noise"];
  $cost = $_POST["cost"];




$sql = "INSERT INTO pets( pet_id,pet_category,cost)
VALUES ('$id','$category','$cost');
INSERT INTO birds(pet_id,type,noise)
 VALUES('$id','$type','$noise')";
if ($conn->multi_query($sql) == TRUE) {
  echo'<div>
  <h1 style="color:#f2f2f2;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">New record of id='
  .$id. ' inserted successfully</h1>
     </div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
