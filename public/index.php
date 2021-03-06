<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/style.css">
    <title>Калькулятор валют</title>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="/public/assets/js/jquery.inputmask.js"></script>
</head>
<body>
<header class="header">
    <div class="header__logo">
        <svg height="38pt" viewBox="-40 0 496 496" width="40pt" xmlns="http://www.w3.org/2000/svg"><path d="m296 32c-48.519531 0-88 39.480469-88 88h16c0-39.703125 32.296875-72 72-72zm0 0"/><path d="m368 120c0 39.703125-32.296875 72-72 72v16c48.519531 0 88-39.480469 88-88zm0 0"/><path d="m416 120c0-66.167969-53.832031-120-120-120-45.953125 0-85.894531 25.984375-106.054688 64h-181.945312c-4.425781 0-8 3.574219-8 8v416c0 4.425781 3.574219 8 8 8h352c4.425781 0 8-3.574219 8-8v-272.222656c29.078125-21.921875 48-56.632813 48-95.777344zm-215.777344 72h-152.222656v-80h128.40625c-.175781 2.65625-.40625 5.296875-.40625 8 0 27.03125 9.089844 51.921875 24.222656 72zm151.777344 288h-336v-400h167c-1.847656 5.199219-3.464844 10.503906-4.585938 16h-138.414062c-4.425781 0-8 3.574219-8 8v96c0 4.425781 3.574219 8 8 8h174.6875c21.410156 19.792969 49.921875 32 81.3125 32 20.222656 0 39.265625-5.070312 56-13.945312zm-56-256c-57.34375 0-104-46.65625-104-104s46.65625-104 104-104 104 46.65625 104 104-46.65625 104-104 104zm0 0"/><path d="m304 160c13.230469 0 24-10.769531 24-24s-10.769531-24-24-24h-16c-4.414062 0-8-3.585938-8-8s3.585938-8 8-8h40v-16h-24v-16h-16v16c-13.230469 0-24 10.769531-24 24s10.769531 24 24 24h16c4.414062 0 8 3.585938 8 8s-3.585938 8-8 8h-40v16h24v16h16zm0 0"/><path d="m88 240h-48c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-32v-32h32zm0 0"/><path d="m168 240h-48c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-32v-32h32zm0 0"/><path d="m248 240h-48c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-32v-32h32zm0 0"/><path d="m88 320h-48c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-32v-32h32zm0 0"/><path d="m168 320h-48c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-32v-32h32zm0 0"/><path d="m248 320h-48c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-32v-32h32zm0 0"/><path d="m272 328v128c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-128c0-4.425781-3.574219-8-8-8h-48c-4.425781 0-8 3.574219-8 8zm16 8h32v112h-32zm0 0"/><path d="m88 400h-48c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-32v-32h32zm0 0"/><path d="m168 400h-48c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-32v-32h32zm0 0"/><path d="m248 400h-48c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h48c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-32v-32h32zm0 0"/></svg>
    </div>
    <div class="header__title">
        <span>Калькулятор валют</span>
    </div>
</header>
<main class="main">
    <form class="form">
        <div class="form__title">
            <span>Калькулятор</span>
        </div>
        <div class="form__content">
            <div class="input__container">
                <input type="text" class="amount animated form__input" oninput="getAmountCurrency()" onkeypress="onlyNumbers()">
                <label>Сумма, руб</label>
            </div>
            <select name="currency" id="currency" class="form__select" oninput="getAmountCurrency()">
                <option value="selectCurrency" selected>Валюта для конвертации</option>
                <?php
                $url = 'https://cbr.ru/scripts/XML_daily.asp'; //записываем ссылку в переменную $url
                $xml = file_get_contents($url); //читает содержимое файла в строку
                $xml = simplexml_load_file($url); //интерпретирует XML-файл в объект
                foreach ($xml as $item){ //проходимся циклом по объекту, извлекаем значения и присваиваем их?>
                    <option value="<?=$item->Value?>">[<?=$item->CharCode?>] <?=$item->Name?></option>
                <?php } ?>
            </select>
            <div class="input__container">
                <input type="text" class="amount_currency animated typed form__input" value="0" disabled>
                <label>Сумма в валюте</label>
            </div>
            <div class="input__container">
                <input type="text" class="email animated form__input">
                <label>E-mail</label>
            </div>
            <a class="form__submit">Записаться на обмен валюты</a>
        </div>
    </form>
    <script src="/public/assets/js/script.js"></script>
</main>
</body>
</html>