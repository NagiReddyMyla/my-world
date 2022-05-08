<?php

$firstname=$_POST['firstname'];
$lasttname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['Gender'];

$conn=mysqli_connect('localhost','root','','MARCH');
if($conn->connect_error){
    die("Connection Failed :". $conn->connect_error);
}
$sql = "SELECT * FROM customer WHERE email='$email' ";
$result = mysqli_query($conn,$sql);
if(isset($_POST['submit'])){
    if (mysqli_num_rows($result)>0){
        echo"Email already exits";
    }else{
            $stmt=$conn->prepare("insert into customer(firstname,lastname,gender,email,password) values(?,?,?,?,?)" );
            $stmt-> bind_param("sssss",$firstname,$lasttname,$gender,$email,$password);
            $stmt->execute();
            echo "  Registration Successful";
            $stmt->close();
            $conn->close();
    }
}
?>
