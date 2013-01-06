<?php

define("VALUE", "Hello.");

final class Site {

    private $value = VALUE;

    public function getValue() {

        return $this->value;
    }
}

echo Site::getValue();