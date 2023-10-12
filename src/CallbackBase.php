<?php

namespace Pachel\Functions;

abstract class CallbackBase
{
    protected $class = "";
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function __call(string $name, array $arguments)
    {
        return $this->class->$name(...$arguments);
    }
}