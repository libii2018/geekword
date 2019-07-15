<?php

    // var_dump('Bonjour');
    // die();

    define('ROOT', dirname(__DIR__));

    require ROOT . '/app/App.php';
    require ROOT . '/core/helpers/url_helper.php';
    // require ROOT . '/config/config.php';

    App::load();