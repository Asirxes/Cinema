<?php
class db{

    static function getDb(){
        $mysqli = new mysqli("localhost", "root", "", "klienci");
        $mysqli->set_charset("utf8");
        return $mysqli;
    }

    static function isLoggedIn($aktualnaSesja)
    {
        $db = db::getDb();
        $tresc = "";
        $pola = ["login"];
        if ($result = $db->query("Select login from sesje where sesja = '$aktualnaSesja'")) {
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
            $db->close();
            if ($tresc == "") {
                $GLOBALS['logged'] = false;
                return null;
            } else {
                $GLOBALS['logged'] = true;
                return trim($tresc);
            }
        }
    }
}