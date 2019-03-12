<?php

class ExampleCls
{
    public function test()
    {
        $memoryUsage = memory_get_usage(true);
        echo 'I am the Test! Memory used: ' . $memoryUsage . PHP_EOL;
    }
}
