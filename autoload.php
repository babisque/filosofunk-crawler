<?php

spl_autoload_register(function (string $classes) {
    $filePath = str_replace('Babisque\MusicList', 'src', $classes);
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $filePath);
    $filePath .= '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    }
});