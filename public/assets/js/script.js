$('.animated').on('ready input', function() {
    if($(this).val().length === 0){ // если какое то поле не имеет введённого значения, то удаляем класс typed
        $(this).removeClass("typed")
    } else{ // иначе добавляем класс typed
        $(this).addClass("typed")
    }
});

// -\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-

$('.form').each(function(){ // сбрасываем форму после перезагрузки страницы
    this.reset();
});

// -\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-

$('.email').hover( // при наведении мыши на поле E-mail
    function() { // добавляется класс typed и атрибуту placeholder задано пустое значение
        $(this).addClass("typed")
        $(this).attr("placeholder", "")
    }, function() { // при отведении, если в поле E-mail нет введённого текста, соответственно класс удаляется
        if($(this).val().length <= 0)
            $(this).removeClass("typed")
    }
);

// -\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-

$('.email').inputmask({ // маска ввода для поля E-mail
    mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
    greedy: false,
    onBeforePaste: function (pastedValue, opts) {
        pastedValue = pastedValue.toLowerCase();
        return pastedValue.replace("mailto:", "");
    },
    definitions: {
        '*': {
            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
            casing: "lower"
        }
    }
});

// -\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-

function onlyNumbers(){ // ввод только чисел
    if (event.keyCode !== 43 && event.keyCode < 48 || event.keyCode > 57)
        event.preventDefault();
}

// -\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-

function getAmountCurrency(){ // моментальный подсчёт суммы в заданной валюте
    let temp = $('.amount').val();
    let kurs = parseFloat($("#currency").val().replace(",", "."));
    let sum = temp / kurs;
    sum = Math.round((sum + Number.EPSILON) * 100) / 100;
    if(isNaN(sum))
        sum = 0;
    $('.amount_currency').val(sum);
}

// -\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-

$('.form__submit').click(function (){ // ajax запрос с отправкой данных в файл обработчик
    $.ajax({
        url: '/public/assets/ajax/ajaxSendEmail.php',
        method: 'post',
        dataType: 'html',
        data: {
            amount: $('.amount').val(),
            currency: $('#currency').val(),
            nameOfCurrency: $('#currency option:selected').text(),
            amountCurrency: $('.amount_currency').val(),
            email: $('.email').val()
        },
        success: function(data){ // после успешного выполнения ajax
            alert(data); // вывод полученного сообщения от обработчика
            $(".form")[0].reset(); // сброс всех полей формы
            $('.amount').removeClass("typed") // удаление класса typed
            $('.email').removeClass("typed") // удаление класса typed
        }
    });
});