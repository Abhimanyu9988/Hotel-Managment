<?php
$username = $_POST['username'];
$mobile = $_POST['mobile']
$email = $_POST['email']
$password = $_POST['password']

if (!empty($username) || !empty($mobile) || !empty($email) || !password($password)) {
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "mahesh99.";
 dbname = "hotelmanage";
 }
 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
 
 if (mysqli_connect_error()) {
 die('Connect Error(' . mysqli_connect_errno(). ')' . mysqli_connect_error());
 } 
  $SELECT = "SELECT email From hotelmanage where email = ? Limit 1";
  $INSERT = "INSERT Into hotelmanage (username, mobile, email, password) values(?,?,?,?)";
  
  $stmt = $conn->prepare($SELECT);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum = $stmt->num_rows;
  
  if ($rnum==0) {
  $stmt->close();
  
  $stmt = $conn->prepare($INSERT);
  $stmt->bind_param("siss", $username, $mobile, $email, $password);
  $stmt->execute();
 echo "done"
 else {
 echo "Someone already registered with this email";
 }
 $stmt->close();
 $conn->close();
 }
 }
 else{
 echo "All field are required";
 die();
 }
 ?>