<?php
include "../klasy/db.php";
include "../klasy/session.php";
$GLOBALS['logged'] = db::isLoggedIn(session::getSession());
if ($GLOBALS['logged'] == null) {
    header("Location: http://localhost/Project/index.php?error=true");
} else {
    $login = db::isLoggedIn(session::getSession());
    $db = db::getDb();
    $tresc = "";
    $pola = ["login", "film", "data"];
    $data = filter_var($_POST["date"], FILTER_SANITIZE_STRING);
    $film = filter_var($_POST["film"], FILTER_SANITIZE_STRING);
    $oldDate = filter_var($_POST['oldDate'], FILTER_SANITIZE_STRING);
    $ilosc = filter_var($_POST["ilosc"], FILTER_SANITIZE_STRING);
    $oldIlosc = filter_var($_POST['oldIlosc'], FILTER_SANITIZE_STRING);
    if ($result = $db->query("Select login,film,data from filmy where login = '$login' and data='$data' and film = '$film' and ilosc='$ilosc'")) {
        $ilepol = count($pola);
        while ($row = $result->fetch_object()) {
            for ($i = 0; $i < $ilepol; $i++) {
                $p = $pola[$i];
                error_reporting(0);
                $tresc .= $row->$p . " ";
                error_reporting(-1);
            }
        }
        $result->close();
        if ($tresc == "") {
            $db->query("UPDATE filmy SET data = '$data',ilosc = '$ilosc' where login = '$login' and data='$oldDate' and film = '$film'");
            header("Location: http://localhost/Project/rezerwacje.php?done=yes");
        } else {
            header("Location: http://localhost/Project/data.php?error=true&film=$film&date=$oldDate&ilosc=$oldIlosc");
        }
    }
}