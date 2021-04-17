<?php
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
<h2>Задача 3: фронт</h2>
    <h3 style="color: red;">Открой код страницы и посмотри телефоны в tel! Они скоро поменяются</h3>
    <h3 style="color: red;">Не успел обновить консоль? Открой ее сейчас и перезагрузи страницу</h3><br>
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
    <script src="../src/phone-disaster-replacement.js?<?=time()?>"></script>
</body>
</html>
