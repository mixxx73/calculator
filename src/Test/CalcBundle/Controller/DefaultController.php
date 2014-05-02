<?php

namespace Test\CalcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Test\CalcBundle\DependencyInjection\Calculator as Calculator;
use Test\CalcBundle\DependencyInjection\Operator as Operator;
use Test\CalcBundle\Entity\Operations as Operations;

use Symfony\Component\HttpFoundation\JsonResponse as JsonResponse;

class DefaultController extends Controller
{
    /**
     * Default action showing calculator and operations history
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $url = $this->generateUrl( 'test_calc_result');

        $history = $this->getDoctrine()
            ->getRepository('TestCalcBundle:Operations')
            ->findAll();
        return $this->render('TestCalcBundle:Default:index.html.twig', array('operatorUrl' => $url, 'history' => $history));
    }

    /**
     * Ajax actions returning result and status
     *
     * @return JsonResponse
     */
    public function resultAction()
    {
        $request = $this->getRequest();

        $argument1 = $request->query->get('argument1');
        $argument2 = $request->query->get('argument2');
        $operator = $request->query->get('operator');

        /** @var \Test\CalcBundle\DependencyInjection\Calculator $result */
        $calc = $this->get('calculator');

        $result = $calc->doOperation($argument1, $argument2, $operator);
        if ($result === false ) {
            $response = array(
                          'status' => 'Error'
                        );
        } else {
            $response = array(
                          'status' => 'Success',
                          'result' => $result
                        );

            $operation = new Operations;
            $operation->setArgument1($argument1);
            $operation->setArgument2($argument2);
            switch($operator) {
                case "add": 
                    $operationSign = '+'; 
                break;
                case "substract": 
                    $operationSign = '-'; 
                break;
                case "multiply": 
                    $operationSign = '*'; 
                    break;
                case "divide": 
                    $operationSign = '/'; 
                break;
            }
            $operation->setOperator($operationSign);
            $operation->setResult($result);
            $em = $this->getDoctrine()->getEntityManager(); 
            $em->persist($operation); 
            $em->flush(); 

        }
        $response = new JsonResponse($response);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
