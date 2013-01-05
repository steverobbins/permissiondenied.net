<?php

final class Site {

    private $var = "hello";

    public function var() {

        //return self::$var;
        return "no";
    }
}

echo Site::var();