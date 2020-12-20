<?php
// implementation of a simple PSR-4 Autoloader
function autoloader($className)
{
    $dir = str_replace('\\', '/', $className);
    $file = __DIR__ . '/../classes/' . $dir . '.php';
    include $file;
}

spl_autoload_register('autoloader');
