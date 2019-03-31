<?php
/* form.php */
    session_start();
    $_SESSION['message'] = '';
    $mysqli = new mysqli("localhost", "root", " ", "hotelmanage");

    //form HTML code here.....
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['password'] == $_POST['confirmpassword']) {
		
		$username = $mysqli->real_escape_string($_POST['username']);
		$email = $mysqli->real_escape_string($_POST['email']);
		$password = md5($_POST['password']); 
		
		
		$_SESSION['username'] = $username;
		$sql = "INSERT INTO customer (username, password, mobile, email) "
		. "VALUES ('$username' , '$password' , '$mobile' , '$email')";
	
if ($mysqli->query($sql) === true) {
header("location: index.html");

}
else {
	$_SESSION['message'] = "user could not be added to the database!" ;
	
}

	
	

	
	//connection variables
$host = 'localhost';
$user = 'root';
$password = '';

//create mysql connection
$mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}

//create the database
if ( !$mysqli->query('CREATE DATABASE accounts2') ) {
    printf("Errormessage: %s\n", $mysqli->error);
}

//create users table with all the fields
$mysqli->query('
CREATE TABLE `accounts2`.`users` 
(
    
    `user_name` VARCHAR(20) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
	`mobile` INT (20) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
	
PRIMARY KEY (`username`) 
);') or die($mysqli->error); 

?> 
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?== $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>