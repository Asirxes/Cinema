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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<div class="w3-main" style="margin-left:250px;margin-bottom: 70px">

    <div class="w3-hide-large" style="margin-top:83px"></div>

    <div class="w3-display-container w3-container mt-5">
        <img src="photos/info.jpg" alt="Jeans" style="width:100%">
        <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
            <h1 class="w3-jumbo w3-hide-small"><i class="bi bi-badge-8k"></i>INOSZE</h1>
            <h1 class="w3-hide-small">Nasza miłość do kinematografii jest jak filmy w naszym kinie, najwyższej
                jakości!</h1>
        </div>
    </div>

    <div class="w3-row w3-grayscale mt-5">
        <div class="w3-panel w3-leftbar w3-light-grey">
            <p><i>"Ciało bez duszy, jest niczym innym niż pustą przestrzenią, a czym innym jest dusza, niż uosobieniem
                    artyzmu człowieka"</i></p>
            <p>Aktor, Reżyser, Kinematograf, Nasz serdeczny przyjaciel: Al Fred</p>
        </div>
    </div>
    <div class="w3-row w3-grayscale mt-5 text-center">
        <h3>Nasz zespół</h3>
        <div class="w3-col l3 s6">
            <div class="w3-container">
                <div class="w3-display-container">
                    <img src="photos/pracownik1.jpg" style="width:100%">
                    <span class="w3-tag w3-display-topleft">Szef szefów</span>
                    <div class="w3-display-middle w3-display-hover">

                    </div>
                </div>
                <p>Eric Monar</p>
            </div>
        </div>
        <div class="w3-col l3 s6">
            <div class="w3-container">
                <div class="w3-display-container">
                    <img src="photos/pracownik2.webp" style="width:100%">
                    <span class="w3-tag w3-display-topleft">Specjalista</span>
                    <div class="w3-display-middle w3-display-hover">

                    </div>
                </div>
                <p>Łukasz Mostowiak</p>
            </div>
        </div>
        <div class="w3-col l3 s6">
            <div class="w3-container">
                <div class="w3-display-container">
                    <img src="photos/pracownik3.jpg" style="width:100%">
                    <span class="w3-tag w3-display-topleft">Kontrolerka jakości</span>
                    <div class="w3-display-middle w3-display-hover">

                    </div>
                </div>
                <p>Katarzyna Fortepian</p>
            </div>
        </div>
        <div class="w3-col l3 s6">
            <div class="w3-container">
                <div class="w3-display-container">
                    <img src="photos/pracownik4.jpg" style="width:100%">
                    <span class="w3-tag w3-display-topleft">Biurowy milusiński</span>
                    <div class="w3-display-middle w3-display-hover">

                    </div>
                </div>
                <p>Kapeć</p>
            </div>
        </div>
        <p class="w3-opacity"><i>Kochamy kino</i></p>
        <p class="w3-justify">Jesteśmy jedynym w Polsce kinem zarządzanym przez 3 (nie licząc naszego czteronożnego
            przyjaciela) osoby, jedynym oferującym obraz na wielkim ekranie
            w najnowocześniejszej technologii 8K! Ktoś mógłby się zapytać: "Czy prowadzenie tak nowoczesnego kina w
            centrum Lublina nie jest zbyt trudne?!", faktycznie, jest trudne,
            ale zdecydowanie nie za trudne! Jesteśmy pasjonatami, którzy poznali się na uczelni kinematografii w
            Warszawie. Mały zespół daje możliwość sprecyzowania bardzo konkretnego celu
            rozwoje naszego przybytku. Ukierunkowaliśmy naszą działalność tak, aby zapewniała wrażenie takie, jakich
            żadne inne kino w Polsce nie może zapewnić. Dzięki wsparciu
            naszych widzów oraz bardzo dużym zainteresowaniu możemy robić w życiu to, co tak naprawdę kochamy robić.</p>
        <h3>Kontakt</h3>
        <p>email: <a href="" onclick="myFunction()"><u>Kinosze@gmail.com</u></a></p>
        <p>telefon: 532511521</p>
        <p>adres: ul. Królewska 512, 20-283 Lublin</p>
    </div>
    <div id="map" class="mb-5"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>

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
</script>

</body>
</html>


<?php
