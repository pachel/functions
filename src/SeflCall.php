<?php

namespace Pachel\Functions;

trait SeflCall
{
    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return $this->$name(...$arguments);
        }
    }
}