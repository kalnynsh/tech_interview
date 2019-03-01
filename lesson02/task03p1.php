<?php

namespace lesson02;

/**
* 3. Объясните назначение и применение магических методов __get, __set, __isset, __unset, __call и __callStatic.
*     Когда, как и почему их стоит использовать (или нет)?
*
*     Часть 1
*/
/*
Методы __get, __set, __isset, __unset - используются для динамического создания свойств, методов,
который не были объявлены или доступны в текущей области видимости.
Эти магические методы вызываются в контексте объекта, не объявляются статическими.
__get и __set позваляют организовать дополнительную логику со свойствами и скрыть детали реализации.

__set( string $name , mixed $value ) : void - вызывается при присвоении недоступному свойству
__get( string $name ) : mixed - при чтении недоступного свойства
__isset(string $name ) : bool - при передаче недоступного свойства в isset(), empty()
__unset(string $name ) : void - при передаче недоступного свойства в unset()

__call(string $name, array $arguments): mixed - вызывается в контексте объекта при обращении к недоступным методам
__callStatic(string $name, array $arguments): mixed - вызывается в контексте класса при обращении к недоступным методам

__call и __callStatic позваляют организовать дополнительную логику состояний объекта, класса.

Магические методы стоит использовать, если они дают опраданное преимущество гибкости, инкапсуляции.

Недостаток - препятствуют применению Рефлексии.
*/

class PropertyTest
{
    private $privateProperties = [];
    private $hidden = 2;

    public $declared = 1;

    public function __set($name, $value): void
    {
        echo 'Setting ' . $name . ' = ' . $value . PHP_EOL;
        $this->privateProperties[$name] = $value;
    }

    public function __get($name)
    {
        echo PHP_EOL . 'Getting value of ' . $name . PHP_EOL;
        if (key_exists($name, $this->privateProperties)) {
            return $this->privateProperties[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Unknown property given to __get('
            . $name
            . '):'
            . ' in file - '
            . $trace[0]['file']
            . ' on line - '
            . $trace[0]['line'],
            E_USER_NOTICE
        );

        return null;
    }

    public function __isset($name): bool
    {
        echo 'Is set ' . $name . '?' . PHP_EOL;
        return isset($this->privateProperties[$name]);
    }

    public function __unset($name): void
    {
        echo 'Removing ' . $name . '!' . PHP_EOL;
        unset($this->privateProperties[$name]);
    }

    public function getHidden(): int
    {
        return $this->hidden;
    }
}

echo '<pre>';

$obj = new PropertyTest();

$obj->a = 1;
echo $obj->a . PHP_EOL;

var_dump(isset($obj->a));
unset($obj->a);
echo '' . PHP_EOL;

echo 'Check `a` after remove' . PHP_EOL;
var_dump(isset($obj->a));
echo '' . PHP_EOL;

echo '$obj->declared = ' . $obj->declared . PHP_EOL . PHP_EOL;

echo '<p>Закрытые свойства видны внутри класса, поэтому __get() не используется...</p>';
echo '$obj->getHidden() = ' . $obj->getHidden() . PHP_EOL;

echo '<p>Закрытые свойства не видны вне класса, поэтому __get() используется...</p>';
echo '$obj->hidden = ' . $obj->hidden . PHP_EOL;

echo '</pre>'. PHP_EOL;
