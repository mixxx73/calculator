<?php

namespace Test\CalcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Test\CalcBundle\DependencyInjection\Calculator as Calculator;
use Test\CalcBundle\DependencyInjection\Operator as Operator;

class DefaultController extends Controller
{
    public function indexAction()
    {

//        $calc = $this->get('calculator');
  
        return $this->render('TestCalcBundle:Default:index.html.twig');
    }
}
