<?php
include "klasy/db.php";
include "klasy/session.php";
$GLOBALS['logged'] = db::isLoggedIn(session::getSession());
if($GLOBALS['logged']==null){
    header("Location: http://localhost/Project/rejestracja.php?error=login");
}else{
    $sesja = session::getSession();
    $db = db::getDb();
    $db->query("DELETE FROM sesje WHERE sesja = '$sesja'");
    session::endSession();
    header("Location: http://localhost/Project/index.php");
}
