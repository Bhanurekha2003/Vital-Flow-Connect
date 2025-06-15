<?php 
include 'conn.php';
$name="";
$username="";
$password="";
$cpassword="";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'project1');
if(isset($_POST['d_user'])){
   $name = mysqli_real_escape_string($db, $_POST['name']);
   $username =  mysqli_real_escape_string($db, $_POST['username']);
   $password =  mysqli_real_escape_string($db, $_POST['password']);
   $cpassword =  mysqli_real_escape_string($db, $_POST['cpassword']);
   $select = " SELECT * FROM donor_info WHERE username = '$username' && password = '$password' ";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist!';
   }else{
      if($password != $cpassword){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO donor_info(name, username, password,cpassword) VALUES('$name','$username','$password','$cpassword')";
         mysqli_query($conn, $insert);
         header('location:donor.php');
      }
   }
};
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration for Donor</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
  <form method="post" action=" ">
  	<?php include('errors.php'); ?>
	  <div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
	  <div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="cpassword">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="d_user">Register</button>
  	</div>
	<p>
  		Already a member? <a href="donor.php">Sign in</a>
  	</p>
  </form>
</body>
</html>