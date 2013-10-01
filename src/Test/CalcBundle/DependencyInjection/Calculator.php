<?php

namespace Test\CalcBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

use Test\CalcBundle\DependencyInjection\Operator;


class Calculator
{
    protected $operator;

    public function __construct(Operator $operator)
    {
        $this->operator = $operator;
    }

    public function doOperation($argument1, $argument2, $operation)
    {
        $this->operator->setArgument1($argument1);
        $this->operator->setArgument2($argument2);

        try {
            return $this->operator->$operation();
        } catch (Exception $e) {
            return false;

        }
    }
}
