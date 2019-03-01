<?php

namespace lesson02;

/** 5. Найдите все ошибки в коде: */

interface MyInterface
{
    public function methodI();
    public function methodP();
}

class A
{
    protected $property1;
    private $property2;

    public function getProperty1()
    {
        return $this->property1;
    }

    public function setProperty1($data): void
    {
        $this->property1 = $data;
    }

    public function getProperty2()
    {
        return $this->property2;
    }

    public function setProperty2($data): void
    {
        $this->property2 = $data;
    }
}

class B extends A
{
    public function getClass()
    {
        return self::class;
    }
}

class C extends A implements MyInterface
{
    public function methodP(): int
    {
        return 123;
    }

    public function methodI(): string
    {
        return 'Some useful data from ' . self::class;
    }
}

echo 'Object B' . PHP_EOL;
$b = new B();
$b->setProperty2('Big data');
echo $b->getProperty2() . ' from '. $b->getClass() . PHP_EOL;
echo '____________________' . PHP_EOL;

echo 'Object C' . PHP_EOL;
$c = new C();
echo $c->methodI() . PHP_EOL;
