<?php include('server.php') ?>
<?php 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>

<html class="desktop mbr-site-loaded"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>ISA</title>
  <link rel="icon" type="image/x-icon" href="./mitm logo.jpg">
  <link rel="stylesheet" href=".\ss\tmt\bootstrap.min.css">
  <link rel="stylesheet" href=".\ss\tmt\style(1).css">
   <link rel="preload" as="style" href=".\ss\tmt\mbr-additional.css"><link rel="stylesheet" href=".\ss\tmt\mbr-additional.css" type="text/css">
 <body>
 
<head>
  <title>ISA</title>
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
 
</head>
<body>

  <section class="menu menu1 cid-svGZR3ZApP" once="menu" id="menu1-f">
    
    <nav>
        
    <img src="navb.png"/>
    
    <a href="index.php?logout='1'"><h2>Logout</h2></a>
                         
    </nav>
</section>
<section class="features4 cid-svGY4J6ohy" id="features04-3">
    
    
    <div class="container">
        <div class="row">
            <div class="card col-12 col-md-12 col-lg-6">
                <div class="card-wrapper">
                    <h3 class="card-number mbr-fonts-style display-5"><strong>01</strong></h3>

                    <div class="card-box">
                      <a href="insert_student.php" h4 class="card-title mbr-fonts-style mb-2 display-5"><strong>Insert Students</strong></h4></a>
                    </div>
                    <span class="mbr-iconfont m-auto mobi-mbri-arrow-next mobi-mbri"></span>
                </div>
            </div>
            <div class="card col-12 col-md-12 col-lg-6">
                <div class="card-wrapper">
                    <h3 class="card-number mbr-fonts-style display-5"><strong>02</strong></h3>

                    <div class="card-box">
                        <a href="all_records.php" h4 class="card-title mbr-fonts-style mb-2 display-5"><strong>View Students</strong></h4></a>
                        
                    </div>
                    
                    <span class="mbr-iconfont m-auto mobi-mbri-arrow-next mobi-mbri"></span>
                </div>
            </div>
            <div class="card col-12 col-md-12 col-lg-6">
                <div class="card-wrapper">
                    <h3 class="card-number mbr-fonts-style display-5"><strong>03</strong></h3>


                    <div class="card-box">
                    <a href="insert_room.php" h4 class="card-title mbr-fonts-style mb-2 display-5"><strong>Insert Rooms</strong></h4></a>
                        
                    </div>
                    <span class="mbr-iconfont m-auto mobi-mbri-arrow-next mobi-mbri"></span>
                </div>
            </div>
            <div class="card col-12 col-md-12 col-lg-6">
                <div class="card-wrapper">
                    <h3 class="card-number mbr-fonts-style display-5"><strong>04</strong></h3>

                    <div class="card-box">
                    <a href="all_records_room.php" h4 class="card-title mbr-fonts-style mb-2 display-5"><strong>View Rooms</strong></h4></a>
                        
                    </div>

                   <span class="mbr-iconfont m-auto mobi-mbri-arrow-next mobi-mbri"></span>
                </div>
            </div>
            <div class="card col-12 col-md-12 col-lg-6">
                <div class="card-wrapper">
                    <h3 class="card-number mbr-fonts-style display-5"><strong>05</strong></h3>


                    <div class="card-box">
                    <a href="allocation1.php" h4 class="card-title mbr-fonts-style mb-2 display-5"><strong>Allocate Students</strong></h4></a>
                        
                    </div>
                    <span class="mbr-iconfont m-auto mobi-mbri-arrow-next mobi-mbri"></span>
                </div>
            </div>
            <div class="card col-12 col-md-12 col-lg-6">
                <div class="card-wrapper">
                    <h3 class="card-number mbr-fonts-style display-5"><strong>06</strong></h3>


                    <div class="card-box">
                    <a href="excel_insert.php" h4 class="card-title mbr-fonts-style mb-2 display-5"><strong>Excel Insert</strong></h4></a>
                        
                    </div>
                    <span class="mbr-iconfont m-auto mobi-mbri-arrow-next mobi-mbri"></span>
                </div>
            </div>


        </div>
    </div>
</section>
</body></html>
