<?php
include "klasy/db.php";
include "klasy/session.php";
$GLOBALS['logged'] = db::isLoggedIn(session::getSession());
?>
<!DOCTYPE html>
<html>
<head>
    <title>8KINOSZE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .w3-sidebar a {
            font-family: "Roboto", sans-serif
        }

        body, h1, h2, h3, h4, h5, h6, .w3-wide {
            font-family: "Montserrat", sans-serif;
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
        if ($GLOBALS['logged']!=null) {
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

<div class="w3-main" style="margin-left:250px;margin-bottom: 70px"
">

<div class="w3-hide-large" style="margin-top:83px"></div>

<div class="w3-display-container w3-container mt-5">
    <img src="photos/desert.jpg" alt="Jeans" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
        <h1 class="w3-jumbo w3-hide-small">Bezkresna pustynia</h1>
        <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
        <h1 class="w3-hide-small">Bilety już od $19.90!</h1>
        <p><a href="rezerwacja.php?film=Bezkresna Pustynia"
              class="w3-button w3-black w3-padding-large w3-large btn btn-primary">Zarezerwuj już teraz</a></p>
    </div>
</div>

<div class="w3-row w3-grayscale mt-5">
    <div class="w3-col l3 s6">
        <div class="w3-container">
            <div class="w3-display-container">
                <img src="photos/Ostatnia_Stacja_Przed_Nami.jpg" style="width:100%">
                <span class="w3-tag w3-display-topleft">Nowy</span>
                <div class="w3-display-middle w3-display-hover">
                    <a href="rezerwacja.php?film=Lustrzany most">
                        <button class="w3-button w3-black btn"
                        ">Rezerwacja<i class="fa fa-shopping-cart"></i></button></a>
                </div>
            </div>
            <p>Lustrzany most<br><b>$19.90</b></p>
        </div>
        <div class="w3-container">
            <div class="w3-display-container">
                <img src="photos/Farmerska_Przystań.jpg" style="width:100%">
                <div class="w3-display-middle w3-display-hover">
                    <a href="rezerwacja.php?film=Farmerska przystań">
                        <button class="w3-button w3-black btn"
                        ">Rezerwacja<i class="fa fa-shopping-cart"></i></button></a>
                </div>
            </div>
            <p>Farmerska przystań<br><b>$15.90</b></p>
        </div>
    </div>

    <div class="w3-col l3 s6">
        <div class="w3-container">
            <div class="w3-display-container">
                <img src="photos/Dziewczę_Z_Aparatem.jpg" style="width:100%">
                <span class="w3-tag w3-display-topleft">Nowy</span>
                <div class="w3-display-middle w3-display-hover">
                    <a href="rezerwacja.php?film=Dziewczę z aparatem">
                        <button class="w3-button w3-black btn"
                        ">Rezerwacja<i class="fa fa-shopping-cart"></i></button></a>
                </div>
            </div>
            <p>Dziewczę z aparatem<br><b>$19.90</b></p>
        </div>
        <div class="w3-container">
            <div class="w3-display-container">
                <img src="photos/upa.jpg" style="width:100%">
                <div class="w3-display-middle w3-display-hover">
                    <a href="rezerwacja.php?film=LandLord 2 : Pustkowie">
                        <button class="w3-button w3-black btn"
                        ">Rezerwacja<i class="fa fa-shopping-cart"></i></button></a>
                </div>
            </div>
            <p>Landlord 2 : Pustkowie<br><b>$15.90</b></p>
        </div>
    </div>

    <div class="w3-col l3 s6">
        <div class="w3-container">
            <div class="w3-display-container">
                <img src="photos/5.jpg" style="width:100%">
                <div class="w3-display-middle w3-display-hover">
                    <a href="rezerwacja.php?film=Ile możemy wytrzymać?">
                        <button class="w3-button w3-black btn"
                        ">Rezerwacja<i class="fa fa-shopping-cart"></i></button></a>
                </div>
            </div>
            <p>Ile możemy wytrzymać?<br><b>$15.90</b></p>
        </div>
        <div class="w3-container">
            <div class="w3-display-container">
                <img src="photos/6.jpg" style="width:100%">
                <span class="w3-tag w3-display-topleft">8K</span>
                <div class="w3-display-middle w3-display-hover">
                    <a href="rezerwacja.php?film=Piękno natury">
                        <button class="w3-button w3-black btn"
                        ">Rezerwacja<i class="fa fa-shopping-cart"></i></button></a>
                </div>
            </div>
            <p>Piękno natury<br><b>$24.99</b></p>
        </div>
    </div>

    <div class="w3-col l3 s6">
        <div class="w3-container">
            <div class="w3-display-container">
                <img src="photos/7.jpg" style="width:100%">
                <span class="w3-tag w3-display-topleft">Nominacja do Oscara</span>
                <div class="w3-display-middle w3-display-hover">
                    <a href="rezerwacja.php?film=Ostatnia stacja przed nami">
                        <button class="w3-button w3-black btn"
                        ">Rezerwacja<i class="fa fa-shopping-cart"></i></button></a>
                </div>
            </div>
            <p>Ostatnia stacja przed nami<br><b>$19.90</b></p>
        </div>
        <div class="w3-container">
            <div class="w3-display-container">
                <img src="photos/8.jpg" style="width:100%">
                <span class="w3-tag w3-display-topleft">Ostatnia chwila | 8K</span>
                <div class="w3-display-middle w3-display-hover">
                    <a href="rezerwacja.php?film=W puszczy i w puszczy">
                        <button class="w3-button w3-black btn"
                        ">Rezerwacja<i class="fa fa-shopping-cart"></i></button></a>
                </div>
            </div>
            <p>W puszczy i w puszczy<br><b>$24.99</b></p>
        </div>
    </div>
</div>
<div class="w3-black w3-center w3-padding-24 fixed-bottom">Created by Karol Kowalczyk</div>
</div>

<script>

    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>

</body>
</html>

<?php
if (isset($_GET["error"]) && $_GET["error"] == "true") {
    echo '<script>window.onload=function(){alert("Nieupoważniony dostęp!")}</script>';
}