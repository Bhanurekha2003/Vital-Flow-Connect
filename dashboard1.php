<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

#sidebar1{position:relative;margin-top:-20px}
#content{position:relative;margin-left:210px}
@media screen and (max-width: 600px) {
  #content {
    position:relative;margin-left:auto;margin-right:auto;
  }
}


.block-anchor {
            color:red;

            cursor: pointer;
        }
</style>
</head>

<body style="color:red;" >

  <?php
  include 'conn.php';
    include 'session.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

<div id="header1">
<?php include 'header1.php';
?>
</div>
<div id="sidebar1">
<?php
$active="dashboard1";
include 'sidebar1.php'; ?>

</div>
<div id="content">

  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">
          <h1 class="page-title">Dashboard</h1>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
          <div class="col-md-3">
              <div class="panel panel-default panel-info" style="border-radius:50px;">
                <div class="panel-body panel-info bk-primary text-light" style="background-color:#D6EAF8; border-radius:50px">
                  <div class="stat-panel text-center">
                    <?php
                      $sql =" SELECT * from request_details ";
                      $result=mysqli_query($conn,$sql) or die("query failed.");
                      $row=mysqli_num_rows($result);

                    ?>


                    <div class="stat-panel-number h1"><?php echo $row?></div>
                    <div class="stat-panel-title text-uppercase">Blood Requestors </div>
                    <br>
                      <button class="btn btn-danger" onclick="window.location.href = 'request_list.php';">
                        Full Detail <i class="fa fa-arrow-right"></i>
                      </button>


                  </div>
                </div>

              </div>
            </div>

        </div>
      </div>
    </div>
  <?php
 } else {
     echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
     ?>
     <form method="post" name="" action="login.php" class="form-horizontal">
       <div class="form-group">
         <div class="col-sm-8 col-sm-offset-4" style="float:left">

           <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
         </div>
       </div>
     </form>
 <?php }
  ?>

</body>
</html>
