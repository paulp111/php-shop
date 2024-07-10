<?php

spl_autoload_register(function ($class) {
    $file = '../src/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
