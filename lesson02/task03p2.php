<?php

namespace lesson02;

/**
* 3. Объясните назначение и применение магических методов __get, __set, __isset, __unset, __call и __callStatic.
*     Когда, как и почему их стоит использовать (или нет)?
*
*     Часть 2
*/

class MethodTest
{
    public function __call(string $name, array $args)
    {
        $argsStr = implode(', ', $args);

        echo 'Calling method: '
        . $name
        . ' with args: '
        . $argsStr
        . PHP_EOL;
    }

    public static function __callStatic(string $name, array $args)
    {
        $argsStr = implode(', ', $args);

        echo 'Calling static method: '
        . $name
        . ' with args: '
        . $argsStr
        . PHP_EOL;
    }
}

echo '<pre>';

$obj = new MethodTest();
[$a, $b, $c, $d] = [10, 20, 30, 40];

$obj->runMethod('in object context', [$a, $b]);
echo '' . PHP_EOL;

MethodTest::runStaticMethod('in class context', [$c, $d]);
echo '' . PHP_EOL;

echo '</pre>'. PHP_EOL;
