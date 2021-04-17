<?php
// получаем все классы. Один класс — одно задание
$my_load = function ($classname) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . "$classname.php";

    if (file_exists($path)) {
        require_once($path);
    }
};

\spl_autoload_register($my_load);

$rand_phone_numbers = \myClasses\PhoneDisaster::getRandPhones();
$rand_city = \myClasses\PhoneDisaster::getRandCity();
$rand_phone_number = \myClasses\PhoneDisaster::getRandPhoneNumber();

?>
<html>
<head>
    <script>
        <?php
//            Формируем массив со случайным городом и телефоном
        ?>
        var myCityNumberArr = [
            "<?= $rand_city ?>",
            "<?= $rand_phone_number ?>"
        ]
    </script>
</head>
<body>
<h2><a target='_blank' href='http://task4developer.tilda.ws/backend-easy-task'>Задача 3: фронт</a></h2><br><br>
    <h3 style="color: red;">Открой код страницы и посмотри телефоны в tel! Они скоро поменяются</h3>
    <?php
    $count = 1;
//    заполняем страницу случайными телефонами
    foreach($rand_phone_numbers as $tel) {
        $if_we_make_phone_url = rand(0, 1);
//        если это телефон — добавили префикс tel:
        if ($if_we_make_phone_url) {
            echo "<a href='tel:{$tel}'>Телефон {$count}</a><br><br>";
        } else {
            echo "<a href='{$tel}'>Не телефон {$count}</a><br><br>";
        }

        $count++;
    }
    ?>
    <script src="src/phone-disaster-replacement.js?<?=time()?>"></script>
</body>
</html>
