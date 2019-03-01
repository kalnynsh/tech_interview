<?php

echo '<h4>1. В чем заключается суть ключевого слова global? Когда его применение целесообразно?</h4>';
// Ответ:
//  global - используется для деклорации глобальной области видимости
//  для переменных (global scope).
//  Внутри функции создается ссылка на глобальную переменную.
//  Применение глобальных переменых редко используется,
//  опастно не преднамеренным из измененинием.

$a = 1;
$b = 2;

function Sum()
{
    // Декларируем в глобальной области видимости
    global $a, $b;

    // Получаем значения из вне локальной области видимости функции
    $b = $a + $b;
}

Sum();
echo $b . '</br>'; // 3

// Пример использования специального глобального
// массива $GLOBALS['value'] - superglobal
$c = 3;
$d = 4;

function SumTwo()
{
    $GLOBALS['d'] = $GLOBALS['c'] + $GLOBALS['d'];
}

SumTwo();
echo $d . '</br>'; // 7

// 2. Какие суперглобальные переменные вы знаете?

// Суперглобальными переменными являются:
/*
echo  var_dump($GLOBALS) . '<br>';
echo  var_dump($_SERVER) . '<br>';
echo  var_dump($_GET)    . '<br>';
echo  var_dump($_POST)   . '<br>';
echo  var_dump($_FILES)  . '<br>';
echo  var_dump($_COOKIE) . '<br>';
echo  var_dump($_SESSION) . '<br>';
echo  var_dump($_REQUEST) . '<br>';
echo  var_dump($_ENV)     . '<br>';
 */

// 3. Когда нужно использовать закрывающий дескриптор ?
// Закрывающий дескриптор ?&gt; - используют для отделения
// HTML кода от PHP кода.
// Если файл содержит только PHP код закрывающий дескриптор ?&gt; не используют.

echo '<h4>Задание 4</h4>';
// 4. Что выведет программа в каждом случае и почему?

function changeX($x)
{
    // Работаем с копией $x
    $x += 5;
    echo $x . '</br>';
}

$x = 1;
echo 'Before $x = ' . $x . '</br>'; // 1

echo 'changeX($x) = ';
changeX($x); // 6

// Значение $x не изменяется (=1)
echo 'After $x = ' . $x . '</br>'; // 1

// 5. Что выведет программа в каждом случае и почему?
//

echo '<h4>Задание 5</h4>';

function test()
{
    // declare static variable
    static $a = 0;

    echo $a . '</br>';
    $a++;
}

test(); // 0
test(); // 1
test(); // 2

echo '<h4>Задание 6</h4>';
echo '<p>Как перевернуть массив?</p>';

// 6. Как перевернуть массив?
// Есть массив array(‘h’, ‘e’, ‘l’, ‘l’, ‘o’), как из него получить array(‘o’, ‘l’, ‘l’, ‘e’, ‘h’)?
$srcArray = ['h', 'e', 'l', 'l', 'o'];
$reverseArray = array_reverse($srcArray);

print_r($srcArray);
echo '<br/>';
print_r($reverseArray);

echo '<h4>7. Как перевернуть строку задом наперед?</h4>';

$srcString = 'Hello world!';
echo 'Исходная строка: ' . $srcString . '<br>';
echo 'Перевернутая строка: ' . strrev($srcString) . '<br>';

function mbStrReverse($str)
{
    $result = '';

    for ($idx = mb_strlen($str); $idx >= 0; $idx--) {
        $result .= mb_substr($str, $idx, 1);
    }

    return $result;
}

$srcString = 'а роза упала на лапу а зора';

echo 'Исходная строка: ' . $srcString . '<br>';
echo 'Перевернутая строка: ' . mbStrReverse($srcString) . '<br>';

echo '<h4>8. Что будет результатом работы данного кода?</h4>';

$a1 = 0;

if ($b1 = $a1) { // $b1 = 0 --> bool False
    echo "One" . '<br>';
} else {
    echo "Two" . '<br>'; // "Two", False
}

echo '<h4>9. Сгенерировать три случайных числа в диапазоне от 0 до 10.
 Если сумма этих чисел меньше 15, сгенерировать новую тройку.</h4>';

function randomThree()
{
    $first = random_int(0, 10);
    $second = random_int(0, 10);
    $third = random_int(0, 10);

    $result = [$first, $second, $third];

    if (array_sum($result) < 15) {
        return randomThree();
    }

    return $result;
}

$resultArray =  randomThree();
echo implode(', ', $resultArray);
echo '<br>';

echo '<h4>10. Какое число выведет данный код?</h4>';

$i = 10;
//                             `++$i`
$i += ++$i + $i + $i++; // 11 + (11 + 11 + 11)
// 44 + 1 ($i++)
echo $i; // 45
echo '<br>';

echo '<h4>11. Что выведет приведенный ниже код?</h4>';

$a2 = "1";
$a2[$a2] = "2"; // 0 => "1", 1 => "2",

echo $a2; // "12"
