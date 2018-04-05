<?php
session_start();
if(!isset($_SESSION['userid'])) {
	die('Bitte zuerst <a href="sidebar_default.php">einloggen</a>');
}

//errrorhandler
$error = false;


//Deutsches datumsformat
setlocale(LC_TIME, "de_DE.utf8");
$kal_datum = time();

$kal_tage_gesamt = date("t", $kal_datum);
$kal_start_timestamp = mktime(0,0,0,date("n",$kal_datum),1,date("Y",$kal_datum));
$kal_start_tag = date("N", $kal_start_timestamp);
$kal_ende_tag = date("N", mktime(0,0,0,date("n",$kal_datum),$kal_tage_gesamt,date("Y",$kal_datum)));
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startseite</title>
	
	<!-- Style CSS -->
	 <link href="style.css" rel="stylesheet">
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">

        <?php include ("sidebar.php"); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="page col-lg-12">
                        <div class="row">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                            <h1>All deine Verträge im Überblick </h1>
                            <div class="box-grid col-lg-4">
                                <div class="row">
                                    <div id="card">
                                        <figure class="front">
                                            <div id="new">+</div>
                                        </figure>
                                        <figure class="back">
                                            <form action="?login=1" method="post">
                                                E-Mail:<br>
                                                <input type="email" size="40" maxlength="250" name="email"><br><br>


                                                Dein Passwort:<br>
                                                <input type="password" size="40"  maxlength="250" name="passwort"><br>

                                                <input type="submit" value="Abschicken">
                                            </form> 
                                        </figure>
                                    </div>
                                </div>
                                
                                <?php 
                                    if (!$error) {
                                        echo('display vertragsdaten');
                                    } else {
                                        Echo($error);
                                    }
                                ?>
                    
                            </div>
                            <div class="box-grid col-lg-4">
                                <div class="box-header"><h3>Konto 2</h3></div>
                            </div>
                            <div class="box-grid col-lg-4">
                            <div class="box-header"><h3>Konto 3</h3></div>
                            </div>

                                <table class="kalender">
                                  <caption><?php echo strftime("%B %Y", $kal_datum); ?></caption>
                                  <thead>
                                    <tr>
                                      <th>Mo</th>
                                      <th>Di</th>
                                      <th>Mi</th>
                                      <th>Do</th>
                                      <th>Fr</th>
                                      <th>Sa</th>
                                      <th>So</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                     <?php
                                        for($i = 1; $i <= $kal_tage_gesamt+($kal_start_tag-1)+(7-$kal_ende_tag); $i++)
                                        {
                                            $kal_anzeige_akt_tag = $i - $kal_start_tag;
                                            $kal_anzeige_heute_timestamp = strtotime($kal_anzeige_akt_tag." day", $kal_start_timestamp);
                                            $kal_anzeige_heute_tag = date("j", $kal_anzeige_heute_timestamp);
                                            if(date("N", $kal_anzeige_heute_timestamp) == 1)
                                              echo "<tr>\n";
                                            if(date("dmY", $kal_datum) == date("dmY", $kal_anzeige_heute_timestamp))
                                              echo "      <td class=\"kal_aktueller_tag\">", $kal_anzeige_heute_tag,"</td>\n";
                                            elseif($kal_anzeige_akt_tag >= 0 AND $kal_anzeige_akt_tag < $kal_tage_gesamt)
                                              echo "      <td class=\"kal_standard_tag\">", $kal_anzeige_heute_tag,"</td>\n";
                                            else
                                              echo "      <td class=\"kal_vormonat_tag\">", $kal_anzeige_heute_tag,"</td>\n";
                                            if(date("N", $kal_anzeige_heute_timestamp) == 7)
                                              echo "    </tr>\n";
                                        }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
        
    $("#new").click(function(e) {
    e.preventDefault();
    $("#card").toggleClass("flipped");
    });
    </script>

</body>

</html>