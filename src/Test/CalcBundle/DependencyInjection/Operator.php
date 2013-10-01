<?php

namespace Test\CalcBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class Operator
{
    private $argument1;
    private $argument2;

    private function validateArgument($argument)
    {
        if (!is_numeric($argument))
            throw new \Exception('Argument have to be numeric');
        return true;
    }

    public function setArgument1($argument)
    {
        if ($this->validateArgument($argument))
            $this->argument1 = $argument;
    }

    public function setArgument2($argument)
    {
        if ($this->validateArgument($argument))
            $this->argument2 = $argument;
    }

    public function add()
    {
        return $this->argument1 + $this->argument2;
    }

    public function substract()
    {
        return $this->argument1 - $this->argument2;
    }

    public function multiply()
    {
        return $this->argument1 * $this->argument2;
    }

    public function divide()
    {
        if ($this->argument2 == 0)
            throw new \Exception('Can not divide by 0');

        return $this->argument1 / $this->argument2;
    }
}
