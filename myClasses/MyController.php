<?php


namespace myClasses;


class MyController
{
    private const VIEW_PATH = __DIR__ . "/../view";

    public static function run()
    {
        if (isset($_REQUEST["r"])) {
            $view = $_REQUEST["r"];

            if (in_array($view, ["ladder", "arrays", "phone-disaster"])) {
                self::runMyView($view);
            } else {
                self::runError();
            }
            exit;
        }

    }

    public static function runMyView($view_name)
    {
        $path = self::VIEW_PATH . "/{$view_name}.php";
        $path = str_replace("/", DIRECTORY_SEPARATOR, $path);
        if (file_exists($path)) {
            echo "<h3><a href='/'><<< НАЗАД</a></h3>";
            include_once($path);
        }
    }

    public static function runError()
    {
        echo "<h3><a href='/'><<< НАЗАД</a></h3>";
        echo "<h2>Такой страницы нет!</h2>";
    }
}