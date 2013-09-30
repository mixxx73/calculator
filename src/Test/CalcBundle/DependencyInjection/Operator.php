<?php

namespace Test\CalcBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class Operator
{
    public $argument1;
    public $argument2;

    private function validateArgument($argument)
    {
        if (is_numeric($argument))
            throw new Exception('Argument have to be numeric');
        return true;
    }

    public function setParameter1($argument)
    {
        if ($this->validateArgument($argument))
            $this->argument1 = $argument;
    }

    public function setParameter2($argument)
    {
        if ($this->validateArgument($argument))
            $this->argument2 = $argument;
    }

    public function add()
    {
        return $this->parameter1 + $this->parameter2;
    }

    public function substract()
    {
        return $this->parameter1 - $this->parameter2;
    }

    public function multiply()
    {
        return $this->parameter1 * $this->parameter2;
    }

    public function divide()
    {
        if ($this->parameter2 == 0)
            throw new Exception('Can not divide by 0');

        return $this->parameter1 / $this->parameter2;
    }
}
