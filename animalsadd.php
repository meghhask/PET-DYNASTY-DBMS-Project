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
  <title>Animals </title>
    <style>
      body {
  margin: 0;
  /* font-family: Arial, Helvetica, sans-serif; */
  /* background-image: url("demo5.jpg"); */
  background-color: #012e02;
  
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
fieldset { 
	background: white;
	padding: 10px;
  margin: 40px auto;
  max-width:593px;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #4CAF50;


}
      </style>
</head>
<body>
  <div class="topnav">
    <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
    <a href="animalsadd.php">Animal to Add</a>
    <div class="topnav-right">
      <a href="animals.php">Back</a>
    </div>
  </div>

  <!-- <form>
    <button type="submit" formaction="animals.php" style="margin:15px;height: 30px;width: 100px;cursor:pointer;border-radius:15px;
border: 3px solid green;background-color: #4CAF50;color:#f2f2f2;font-size:17px;">
    Back</button>
</form> -->
<form method="post" action="animalsadd.php" >  
<fieldset>
   <input type="text" name="id" placeholder=" Enter Pet ID" style="width:98%;height:30px;
   border: 2px solid  #4CAF50; border-radius:3px; background:transparent;" required >
    <br><br>
   <input type="text" name="category" placeholder="Enter Pet Category" style="width:98%;height:30px;
   border: 2px solid  #4CAF50; border-radius:3px;background:transparent;" required>
   <br><br>
  <input type="text" name="breed"  placeholder="Enter Breed" style="width:98%;height:30px;
   border: 2px solid  #4CAF50; border-radius:3px;background:transparent;" required>
  <br><br>
  <input type="number" step=any name="weight"  placeholder="Enter Weight (in Kg)" style="width:98%;height:30px;
   border: 2px solid  #4CAF50; border-radius:3px;background:transparent;" min="1" required>
  <br><br>
  <input type="number" step=any name="height"  placeholder="Enter Height (in cm)" style="width:98%;height:30px;
   border: 2px solid  #4CAF50; border-radius:3px;background:transparent;" min="15" required>
  <br><br>
  <input type="number" name="age"  placeholder="Enter Age" style="width:98%;height:30px;
   border: 2px solid  #4CAF50; border-radius:3px;background:transparent;" min="1" required>
  <br><br>
  <input type="text" name="fur"  placeholder="Enter Fur Color" style="width:98%;height:30px;
   border: 2px solid  #4CAF50; border-radius:3px;background:transparent;" required>
  <br><br>
  <input type="number" name="cost"  placeholder="Enter Cost" style="width:98%;height:30px;
   border: 2px solid  #4CAF50; border-radius:3px;background:transparent;" min="0" required>
  <br><br>
  <input type="submit" name="submit" value="Save" style="width:100px;height:30px;
   border: 2px solid  #012e02; border-radius:3px; cursor:pointer;background-color: #4CAF50; color:#f2f2f2" >&ensp; 
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
  $breed= $_POST["breed"];
  $weight = $_POST["weight"];
  $height = $_POST["height"];
  $age = $_POST["age"];
  $fur= $_POST["fur"];
  $cost = $_POST["cost"];




$sql = "INSERT INTO pets( pet_id,pet_category,cost)
VALUES ('$id','$category','$cost');
INSERT INTO animals(pet_id,breed,weight,height,age,fur)
 VALUES('$id','$breed','$weight','$height','$age','$fur')";
if ($conn->multi_query($sql) == TRUE) {
  echo'<div>
      <h1 style="color:#f2f2f2;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">New record of Pet ID='
      .$id. ' inserted successfully</h1>
         </div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>