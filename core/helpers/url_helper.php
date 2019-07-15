<?php
    // Simple redirect
    function redirect($page){
        header('location: ' . URLROOT . '/' . $page);
    }

    function verifier($var){
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die();
    }
    