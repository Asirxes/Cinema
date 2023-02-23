<?php
include "klasy/db.php";
include "klasy/session.php";
include "klasy/SD.php";
$GLOBALS['logged'] = db::isLoggedIn(session::getSession());
if($GLOBALS['logged']==null){
    header("Location: http://localhost/Project/rejestracja.php?error=rezerwacje");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>8KINOSZE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="skrypty/index.js"></script>
    <style>
        .w3-sidebar a {
            font-family: "Roboto", sans-serif
        }

        body, h1, h2, h3, h4, h5, h6, .w3-wide {
            font-family: "Montserrat", sans-serif;
        }

        #map {
            height: 400px; /* The height is 400 pixels */
            width: 100%; /* The width is the width of the web page */
        }
    </style>
</head>
<body class="w3-content" style="max-width:1200px">

<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
        <a style="text-decoration: none;color: black;" href="index.php"><h3 class="w3-wide"><b><i
                            class="bi bi-badge-8k"></i>INOSZE</b></h3></a>
    </div>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
        <a href="index.php" class="w3-bar-item w3-button">Strona Główna</a>
        <a href="info.php" class="w3-bar-item w3-button">O nas</a>
        <?php
        if ($GLOBALS['logged'] != null) {
            echo '<a href="rezerwacje.php" class="w3-bar-item w3-button">Rezerwacje</a>
            <a href="wyloguj.php" class="w3-bar-item w3-button">Wyloguj</a>';
        } else {
            echo '<a href="logowanie.php" class="w3-bar-item w3-button">Logowanie</a>
            <a href="rejestracja.php" class="w3-bar-item w3-button">Rejestracja</a>';
        }
        ?>
    </div>
</nav>

<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <a href="index.php" style="color: white">
        <div class="w3-bar-item w3-padding-24 w3-wide"><i class="bi bi-badge-8k"></i>INOSZE</div>
    </a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i
                class="fa fa-bars"></i></a>
</header>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
     id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;margin-bottom: 70px">
    <div class="w3-row w3-grayscale mt-5 ms-5 me-5 text-center">
        <h3 class="mt-5"><b>Twoje rezerwacje:</b>
            <br/>
            <?php
            $db = db::getDb();
            $tresc = "";
            $pola = ["film", "data", "ilosc"];
            $login = $GLOBALS['logged'];
            if ($result = $db->query("Select film,data,ilosc from filmy where login = '$login'")) {
                $ilepol = count($pola);
                $iterator = 1;
                while ($row = $result->fetch_object()) {
                    for ($i = 0; $i < $ilepol; $i++) {
                        $p = $pola[$i];
                        error_reporting(0);
                        if ($iterator % 3 == 0) {
                            $tresc .= $row->$p . "/";
                        } else {
                            $tresc .= $row->$p . "|";
                        }
                        $iterator++;
                        error_reporting(-1);
                    }
                }
                $result->close();
                if ($tresc == "") {
                    echo "<p>Nie posiadasz aktualnie żadnych rezerwacji</p>";
                } else {
                    $explodedTresc = explode("/", $tresc);
                    array_pop($explodedTresc);
                    foreach ($explodedTresc as $item) {
                        $dane = explode("|",$item);
                        $title = SD::GetPhoto($dane[0]);
                        $date = explode("-",$dane[1]);
                        echo "<div class='card mb-3 mt-5'>
  <img class='card-img-top' src='photos/$title' alt='Card image cap' style='height: 200px;'>
  <div class='card-body'>
    <h4 class='card-title'>$dane[0]</h4>
    <h5 class='card-text'>$date[2]-$date[1]-$date[0]</h5>
    <h5 class='card-text'>Ilość biletów: $dane[2]</h5>
    <form method='post' action='data.php?film=$dane[0]&date=$dane[1]&ilosc=$dane[2]'>
    <button type='submit' class='btn btn-secondary'>Zmień datę lub ilość</button></form> 
    <form  class='mt-2' method='post' action='akcje/anuluj.php?film=$dane[0]&date=$dane[1]'><button type='submit' class='btn btn-danger'>Anuluj rezerwację</button></form>
  </div>
</div>";
                    }
                }
            }
            ?>
    </div>


    <div class="w3-black w3-center w3-padding-24 fixed-bottom">Created by Karol Kowalczyk</div>

</body>
</html>

