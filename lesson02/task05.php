<?php

namespace lesson02;

interface MyInt
{
    public function funcI();
    private function funcP();
}

class A
{
    protected $prop1;
    private $prop2;

    public function funcA()
    {
        return $this->prop2;
    }
}

class B extends A
{
    public function funcB()
    {
        return $this->prop1;
    }
}

class C extends B implements MyInt
{
    public function funcB()
    {
        return $this->prop1;
    }

    private function funcP()
    {
        return 123;
    }
}

$b = new B();
$b->funcA();
$c = new C();
$c->funcI();
