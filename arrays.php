<?php

// получаем все классы. Один класс — одно задание
$my_load = function ($classname) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . "$classname.php";

    if (file_exists($path)) {
        require_once($path);
    }
};


\spl_autoload_register($my_load);

echo "<h2><a target='_blank' href='http://task4developer.tilda.ws/backend-easy-task'>Задача 2: массивы</a></h2><br><br>";

\myClasses\Arrays::run1();
\myClasses\Arrays::run2();
\myClasses\Arrays::run3();
\myClasses\Arrays::run4();