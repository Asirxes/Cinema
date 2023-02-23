<?php
include "../klasy/db.php";
include "../klasy/session.php";
$GLOBALS['logged'] = db::isLoggedIn(session::getSession());
if ($GLOBALS['logged'] != null) {
    header("Location: http://localhost/Project/index.php?error=true");
} else {
    $pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$^";
    $db = db::getDb();
    $tresc = "";
    $pola = ["login", "haslo"];
    $login = filter_var($_POST["login"], FILTER_SANITIZE_STRING);
    $haslo = filter_var($_POST["haslo"], FILTER_SANITIZE_STRING);
    if (preg_match($pattern, $haslo) == 0) {
        header("Location: http://localhost/Project/rejestracja.php?error=true");
    } else {
        if (strlen($login) < 1 || strlen($login) > 45 || strlen($haslo) < 1 || strlen($haslo) > 45) {
            header("Location: http://localhost/Project/logowanie.php?error=true");
        } else {
            $hashed = password_hash($haslo, PASSWORD_DEFAULT);
            if ($result = $db->query("Select login from klienci where login = '$login'")) {
                $ilepol = count($pola);
                while ($row = $result->fetch_object()) {
                    for ($i = 0; $i < $ilepol; $i++) {
                        $p = $pola[$i];
                        $tresc .= $row . " ";
                    }
                }
                $result->close();
                if ($tresc == "") {
                    $db->query("INSERT INTO klienci (login,haslo) values ('$login','$hashed')");
                    $sesja = session::getSession();
                    $db->query("INSERT INTO sesje (login,sesja) values ('$login','$sesja')");
                    header("Location: http://localhost/Project/index.php");
                } else {
                    header("Location: http://localhost/Project/rejestracja.php?error=true");
                }
            }
        }
    }
}