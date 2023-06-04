<?php

if (function_exists('debug') == false) {
    function debug ($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}