<?php

session_start();

if(!isset($_SESSION['u_id'])){
	die('Bitte zuerst <a href="index.php">einloggen</a>');
}

if(!$_POST){
	$shop_uid = '';
	$shop_price = '';
	$shop_object = '';
	$shop_store = '';
	$shop_date_bought = '';
	$shop_time_add = '';
}

date_default_timezone_set("Europe/Berlin");
$timestamp = time();

$datum = date("d.m.Y", $timestamp);
$uhrzeit = date("H:i", $timestamp);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ausgaben</title>
	
	<!-- Style CSS -->
	<link href="style.css" rel="stylesheet">
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="bodycolor">
    <div id="wrapper">

        <?php include ("sidebar_usr.php"); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div clavss="row">
					<div class="col-md-12">
					<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
						<h1>Shopped</h1>
					</div>
                    <div class="col-md-12 pfandbox">
					
					<?php
						$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
						 
						if(isset($_GET['send'])) {
							
							$error = false;
							
							include_once 'includes/dbh.inc.php';
						
							//Keine Fehler, wir können den Nutzer registrieren
							//Check database connection
							if( $conection -> conect_error){
								return false;
							} else{
								if( $stmt = $conection->prepare("INSERT INTO ausgaben (shop_uid, shop_price, shop_object, shop_store, shop_date_bought, shop_time_add) VALUE (?, ?, ?, ?, ?, ?)")){
									$stmt->bind_param('ssssss', $shop_uid, $shop_price, $shop_object, $shop_store, $shop_date_bought, $shop_time_add);
												
									$shop_uid = $_SESSION['u_id'];
									$shop_price = $_POST['shopprice'];
									$shop_object = $_POST['shopobject'];
									$shop_store = $_POST['shopstore'];
									$shop_date_bought = $_POST['shopdatebought'];
									$shop_time_add = $datum.'/'.$uhrzeit;
												
									if( !$stmt->execute()){
										return false;
									}
								} else {
									// for debugging purposes use: v
									var_dump($conection->error); exit;
									return false;
								}
							}							
						}
						 
						if($showFormular) {
					?>
					 
					<form action="?send=1" method="post">
						Preis:<br>
						<input type="text" size="40" maxlength="250" name="shopprice"> €<br><br>
						
						Objekt:<br>
						<input type="text" size="40" maxlength="250" name="shopobject"><br><br>
						
						Laden:<br>
						<input type="text" size="40"  maxlength="250" name="shopstore"><br><br>
						
						Kaufdatum:<br>
						<input type="text" size="40"  maxlength="250" name="shopdatebought" id="datepicker"><br><br>
						
						<input type="submit" value="Abschicken">
					</form>
						 
						<?php
						} //Ende von if($showFormular)
						?>
							
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="jquery-ui-1.12.0.custom/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="jquery-ui-1.12.0.custom/jquery-ui.min.css">
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
		$(document).ready(function(){
			$("#datepicker").datepicker({
				dateFormat: "dd.mm.yy"
			});
			
		});
	</script>
</body>
</html>