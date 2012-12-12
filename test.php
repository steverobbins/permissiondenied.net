<pre><?php

final class foo {

    protected $store = array();

    public function __construct() {

        self::setStore();
    }

    public function setStore() {

        $this->store = array(1,2,3);
    }

    public function getStore($store = $store) {

        var_dump($store);
    }
}

foo::getStore();