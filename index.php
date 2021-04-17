<?php
// получаем все классы. Один класс — одно задание
$my_load = function ($classname) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . "$classname.php";

    if (file_exists($path)) {
        require_once($path);
    }
};


\spl_autoload_register($my_load);

\myClasses\MyController::run();

?>
<h1>Максим Пух, тестовое задание backend-easy-task</h1>
<h2><a href='/ladder'>Задача 1: лесенка</a></h2><br>
<h2><a href='/arrays'>Задача 2: массивы</a></h2><br>
<h2><a href='/phone-disaster'>Задача 3: фронт</a></h2><br>
