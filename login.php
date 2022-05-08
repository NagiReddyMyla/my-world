<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MARCH";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$email=$_POST["email"];
$password=$_POST["password"];
$sql = "SELECT * FROM customer WHERE email='$email'  and password='$password'";
$result = mysqli_query($conn,$sql);

if ($result===false) {
    echo mysli_error($conn);
}
else {
    while($row=mysqli_fetch_assoc($result)){
        // print_r($row) ; if we dont know the number of columns in database;
        echo "id"."-".$row["id"]."<br>  "."firstname"."-".$row["firstname"]." <br>"."lastname"."-".$row["lastname"]." <br> "."gender"."-".$row["gender"]."  <br>"."email"."-".$row["email"];
    }
    mysqli_fetch_all($result);
}
$conn->close();
?>
