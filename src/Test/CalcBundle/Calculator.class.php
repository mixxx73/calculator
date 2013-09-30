<?php

namespace Test\CalcBundle\Calculator;

use Test\CalcBundle\Operator;


class Calculator
{
    protected $operator;

    public function __contruct(Operator $operator)
    {
        $this->operator = $operator;
    }

    public function test()
    {
        $this->operator->do();
    }
}
