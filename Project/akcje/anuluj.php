<?php
include "../klasy/db.php";
include "../klasy/session.php";
$GLOBALS['logged'] = db::isLoggedIn(session::getSession());
if ($GLOBALS['logged'] == null) {
    header("Location: http://localhost/Project/index.php?error=true");
} else {
    $login = $GLOBALS['logged'];
    $db = db::getDb();
    $data = filter_var($_GET["date"], FILTER_SANITIZE_STRING);
    $film = filter_var($_GET["film"], FILTER_SANITIZE_STRING);
    $db->query("delete from filmy where film='$film' and data='$data'");
    header("Location: http://localhost/Project/rezerwacje.php");
}