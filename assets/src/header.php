<?php

public class Header() {
     
    public function __construct() {
        die('Init function is not allowed');
    }

    public function show_html() {
        echo "<h1>Header</h1>"
    }
}

?>