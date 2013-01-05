<?php

final class Site {

    private $var = "hello";

    public function var() {

        return self::$var;
    }
}

echo Site::var();