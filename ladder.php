<?php

// получаем все классы. Один класс — одно задание
$my_load = function ($classname) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . "$classname.php";

    if (file_exists($path)) {
        require_once($path);
    }
};


\spl_autoload_register($my_load);

echo "<h2><a target='_blank' href='http://task4developer.tilda.ws/backend-easy-task'>Задача 1: лесенка</a></h2><br><br>";
\myClasses\Ladder::run1();
\myClasses\Ladder::run2();
\myClasses\Ladder::run3();