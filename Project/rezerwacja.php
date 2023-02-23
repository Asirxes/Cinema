<?php
include "klasy/db.php";
include "klasy/session.php";
$GLOBALS['logged'] = db::isLoggedIn(session::getSession());
if($GLOBALS['logged']==null){
    header("Location: http://localhost/Project/rejestracja.php?error=login");
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
        <div class="w3-row w3-grayscale mt-5 text-center">
            <h3><b>Rezerwujesz:</b>
                <?php
                echo $_GET['film'];
                ?></h3>
        </div>
        <div class="w3-row w3-grayscale">
            <form style="margin-left: 10px;margin-right: 10px" action="akcje/zarezerwuj.php" method="post" class="mb-5">;
            <div class="form-group mt-5">
                <?php
                $film = $_GET['film'];
                echo "<input type='text' class='form-control' id='film' aria-describedby='film' name='film' hidden value='$film'>"
                ?>
                <label for="date">Data</label>
                <input type="date" class="form-control" id="datePickerId" aria-describedby="date"
                       name="date" required>
            </div>
            <div class="form-group mt-3">
                <label for="ilosc">Ilość biletów</label>
                <input type="number" class="form-control" id="ilosc" placeholder="Podaj ilość biletów" name="ilosc"
                       min="1" max="100" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-3">Zarezerwuj</button>
                <button type="reset" class="btn btn-danger mt-3">Wyczyść</button>
            </div>

            </form>
            <img src="photos/629a62e1-8da0-4de2-8bc7-6948061e7119_rwc_2459x570x1581x373x4096.png" style="width: 100%"
                 class="mt-5"/>
        </div>
        <div class="w3-black w3-center w3-padding-24 fixed-bottom">Created by Karol Kowalczyk</div>

        <script>
            function myFunction() {
                event.preventDefault();

                navigator.clipboard.writeText("Kinosze@gmail.com");

                alert("Skopiowano email do schowka");
            }

            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
            }

            datePickerId.min = new Date().toLocaleDateString('en-ca');
            var future = new Date();
            future.setDate(future.getDate() + 30);
            datePickerId.max = future.toLocaleDateString('en-ca');


        </script>

    </body>
    </html>

<?php

if (isset($_GET["error"]) && $_GET["error"] == "true") {
    echo '<script>window.onload=function(){alert("Już masz rezerwację na podany film oraz datę, usuń pierwszą rezerwację aby dokonać następnej!")}</script>';
}
