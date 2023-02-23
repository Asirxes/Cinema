<?php

class session{
    static function getSession(){
        session_start();
        return session_id();
    }

    static function endSession(){
        session_destroy();
    }
}