<?php

namespace App\Helpers;

class Helper {
    function debug ($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}