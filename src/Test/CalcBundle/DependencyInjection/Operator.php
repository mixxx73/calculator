<?php

namespace Test\CalcBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class Operator
 * @package Test\CalcBundle\DependencyInjection
 *
 * Do calculator operations
 */
class Operator
{
    /**
     * @var
     * First argument
     */
    private $argument1;
    /**
     * @var
     * Second argument
     */
    private $argument2;

    /**
     * Validate if argument is numeric
     * @param $argument
     * @return bool
     * @throws \Exception
     */
    private function validateArgument($argument)
    {
        if (!is_numeric($argument))
            throw new \Exception('Argument have to be numeric');
        return true;
    }

    /**
     * First argument setter
     * @param $argument
     */
    public function setArgument1($argument)
    {
        if ($this->validateArgument($argument))
            $this->argument1 = $argument;
    }

    /**
     * Second argument setter
     * @param $argument
     */
    public function setArgument2($argument)
    {
        if ($this->validateArgument($argument))
            $this->argument2 = $argument;
    }

    /**
     * Performs adding
     * @return float
     */
    public function add()
    {
        return $this->argument1 + $this->argument2;
    }

    /**
     * Performs substracting
     * @return float
     */
    public function substract()
    {
        return $this->argument1 - $this->argument2;
    }

    /**
     * Performs multiplying
     * @return float
     */
    public function multiply()
    {
        return $this->argument1 * $this->argument2;
    }

    /**
     * Performs dividing
     * @return float
     * @throws \Exception
     */
    public function divide()
    {
        if ($this->argument2 == 0)
            throw new \Exception('Can not divide by 0');

        return $this->argument1 / $this->argument2;
    }
}
