<?php

class XmlDoc {
               
public function build($name = 'index') {
       
        $dom = new DOMDocument("1.0", "utf-8");
        $dom->formatOutput = true;
        $root = $dom->createElement($name);
        $dom->appendChild($root);
       
        return array($root, $dom);
}

public function add($xmlObject, $parent, $field, $value = false, $textNode = false) {
       
        $dom = $xmlObject[1];
       
        $field = $dom->createElement($field);
        $parent->appendChild($field);
       
        if ($value !== false) {               
               
                $text = ($textNode !== false ? $dom->createTextNode($value) : $dom->createCDATASection($value));
                $field->appendChild($text);
        }
       
        return $field;
}

public function attr($xmlObject, $field, $name, $text) {
       
        $dom = $xmlObject[1];
       
        $name = $dom->createAttribute($name);
        $field->appendChild($name);
       
        $value = $dom->createTextNode($text);
        $name->appendChild($value);
}

public function save($xmlObject, $path, $save = true) {
       
        $dom = $xmlObject[1];       
        //echo $dom->saveXML();
       
        if ($save === true) $dom->save($path);
    }
}