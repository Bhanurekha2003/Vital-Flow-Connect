
<?php
$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blood_group=$_POST['blood'];
$address=$_POST['address'];
$conn=mysqli_connect("localhost","root","","project1") or die("Connection error");
$sql= "INSERT INTO request_details(request_name,request_number,request_mail,request_age,request_gender,request_blood,request_address) values('{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$address}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");
header("Location: http://localhost/project1/details2.php");
mysqli_close($conn);
 ?>
