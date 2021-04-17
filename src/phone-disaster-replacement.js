document.addEventListener("DOMContentLoaded", function () {
    //  Ждем сколько-то, потом меняем телефоны
    setTimeout(function () {

        alert("Посмотрели на телефоны в DOM'e? Сейчас они заменятся");

        //  Получаем все ссылки
        var allLinks = document.getElementsByTagName('a');

        for (var i = 0, n = allLinks.length; i < n; i++) {
            var href = allLinks[i].getAttribute("href");
            //  Смотрим, чтобы наша ссылка начиналась с tel:. Начинается — меняем телефон
            if (href.match(/^tel:.*/i) != null) {
                allLinks[i].setAttribute("href", "tel:" + myCityNumberArr[1]);
            }
        }
    }, 1000);

});