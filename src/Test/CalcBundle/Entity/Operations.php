<?php

namespace Test\CalcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operations
 *
 * @ORM\Table(name="operations")
 * @ORM\Entity
 */
class Operations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="operation_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $operationId;

    /**
     * @var float
     *
     * @ORM\Column(name="argument1", type="float", nullable=false)
     */
    private $argument1;

    /**
     * @var float
     *
     * @ORM\Column(name="argument2", type="float", nullable=false)
     */
    private $argument2;

    /**
     * @var float
     *
     * @ORM\Column(name="result", type="float", nullable=false)
     */
    private $result;



    /**
     * Get operationId
     *
     * @return integer 
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * Set argument1
     *
     * @param float $argument1
     * @return Operations
     */
    public function setArgument1($argument1)
    {
        $this->argument1 = $argument1;
    
        return $this;
    }

    /**
     * Get argument1
     *
     * @return float 
     */
    public function getArgument1()
    {
        return $this->argument1;
    }

    /**
     * Set argument2
     *
     * @param float $argument2
     * @return Operations
     */
    public function setArgument2($argument2)
    {
        $this->argument2 = $argument2;
    
        return $this;
    }

    /**
     * Get argument2
     *
     * @return float 
     */
    public function getArgument2()
    {
        return $this->argument2;
    }

    /**
     * Set result
     *
     * @param float $result
     * @return Operations
     */
    public function setResult($result)
    {
        $this->result = $result;
    
        return $this;
    }

    /**
     * Get result
     *
     * @return float 
     */
    public function getResult()
    {
        return $this->result;
    }
    /**
     * @var string
     */
    private $operator;


    /**
     * Set operator
     *
     * @param string $operator
     * @return Operations
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    
        return $this;
    }

    /**
     * Get operator
     *
     * @return string 
     */
    public function getOperator()
    {
        return $this->operator;
    }
}