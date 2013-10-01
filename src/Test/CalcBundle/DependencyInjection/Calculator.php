<?php

namespace Test\CalcBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

use Test\CalcBundle\DependencyInjection\Operator;

/**
 * Class Calculator
 *
 * Performs calculations
 * @package Test\CalcBundle\DependencyInjection
 */
class Calculator
{
    /**
     * @var Operator
     *
     * Operator performing operations
     */
    protected $operator;

    public function __construct(Operator $operator)
    {
        $this->operator = $operator;
    }

    /**
     * Performs operation with operator
     * @param $argument1 First argument
     * @param $argument2 Second argument
     * @param $operation Operation type
     * @return mixed
     */
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
