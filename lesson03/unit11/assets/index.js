/**
 *  11. Написать простую игру «Угадай число».
*  Программа загадывает случайное число от 0 до 100.
*   Игрок должен вводить предположения и получать ответы «Больше», «Меньше» или «Число угадано».
*/

function isNumeric(num) {
    return !isNaN(parseInt(num)) && isFinite(num);
}

function getRandomNumber() {
    return (Math.random() * 100)^0;
}

function checkout(answer, result, correct, tooMany, tooSmall) {
    if (!isNumeric(result)) {
        alert('Введено не число, повторите ввод');
    }

    if (result == answer) {
        return correct();
    }

    if (result > answer) {
        return tooMany();
    }

    if (result > answer) {
        return tooSmall();
    }
}

function correct() {
    return $('#guessResult button')
        .text('Угадал')
        .removeClass('btn-outline-primary')
        .removeClass('btn-outline-secondary')
        .removeClass('btn-outline-danger')
        .addClass('btn-outline-success');
}

function tooMany() {
    return $('#guessResult button')
        .text('Много')
        .removeClass('btn-outline-primary')
        .removeClass('btn-outline-secondary')
        .addClass('btn-outline-danger');
}

function tooSmall() {
    return $('#guessResult button')
        .text('Мало')
        .removeClass('btn-outline-primary')
        .removeClass('btn-outline-danger')
        .addClass('btn-outline-secondary');
}

let number = getRandomNumber();

$('#submitguess').on('click', function() {
        let result = parseInt($('#guessField').val());

        console.log('number =', number, 'result =', result);

        checkout(number, result, correct, tooMany, tooSmall);
});
