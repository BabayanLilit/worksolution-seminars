<?php

require __DIR__ . "/defines.php";
require __DIR__ . "/classes/DatabaseStorage.php";
require __DIR__ . "/classes/FileStorage.php";

spl_autoload_register(function ($className) {
    @include __DIR__ . "/../src/" . $className . ".php";
});
