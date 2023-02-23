<?php

class SD
{
    public static function GetPhoto($title){
        switch ($title){
            case "Bezkresna Pustynia":
                return "desert.jpg";
            case "Lustrzany most":
                return "Ostatnia_Stacja_Przed_Nami.jpg";
            case "Dziewczę z aparatem":
                return "Dziewczę_Z_Aparatem.jpg";
            case "Ile możemy wytrzymać?":
                return "5.jpg";
            case "Ostatnia stacja przed nami":
                return "7.jpg";
            case "Farmerska przystań":
                return "Farmerska_Przystań.jpg";
            case "LandLord 2 : Pustkowie":
                return "upa.jpg";
            case "Piękno natury":
                return "6.jpg";
            case "W puszczy i w puszczy":
                return "8.jpg";
        }
    }
}