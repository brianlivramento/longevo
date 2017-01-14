<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;
use AppBundle\Entity\User;
use AppBundle\Entity\Order;
use AppBundle\Entity\Ticket;

class IndexController extends Controller 
{

    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request, $return = NULL)
    {                
        $isSetTicket = $request->query->get('ticket');
        $nTicket = $request->query->get('nTicket');
        $return =  $request->query->get('return');

        return $this->render('index/index.twig', array(
            'isCheckOrder' => $return,
            'nTicket' => $nTicket,
            'isSetTicket' => $isSetTicket            
        ));
    }

    /**
     * @Route("/isEmailExists", name="isEmailExists")
     */
    public function isEmailExists(Request $request)
    {        
        $email_input = $request->request->get('data');        
        if($email_input != null) 
        {
            $criteria = array('emailUser' => $email_input); 
            $em = $this->getDoctrine()->getManager();
            $result = $em->getRepository('AppBundle\Entity\User')->findBy($criteria);                    
            if($result) 
            {
                $response = array("code" => 100, "success" => true, "email_inform" => $email_input);
                return new Response(json_encode($response)); 
            } 
        }
        $response = array("code" => 100, "success" => false, "email_inform" => $email_input);
        return new Response(json_encode($response)); 
    }


    /**
     * @Route("/isOrderExists", name="isOrderExists")
     */
    public function isOrderExists(Request $request)
    {
        $order_input = $request->request->get('data');        
        if($order_input != null) 
        {
            $criteria = array('codOrder' => $order_input); 
            $em = $this->getDoctrine()->getManager();
            $result = $em->getRepository('AppBundle\Entity\Order')->findBy($criteria);                    
            if($result) 
            {
                $response = array("code" => 100, "success" => true, "order_inform" => $order_input);
                return new Response(json_encode($response)); 
            } 
        }
        $response = array("code" => 100, "success" => false, "order_inform" => $order_input);
        return new Response(json_encode($response)); 
    }

    /**
     * @Route("/setTicket", name="setTicket")
     */
    public function setTicket(Request $request)
    {                
        $title = $request->request->get('select_title');
        $description =  $request->request->get('textarea_desc');
        $codOrder =  $request->request->get('input_order');
        
        if($title != null && $codOrder != null)
        {
            $t = new Ticket();
            $t->setTitleTicket($title);
            $t->setDescTicket($description);
            $t->setDateTicket(new \DateTime());
            $t->setUpdateDateTicket(new \DateTime());
            $t->setStatusTicket(0);
            $t->setCodOrder($codOrder);
            $em = $this->getDoctrine()->getManager();
            $em->persist($t);
            $em->flush();     
            $nTicket = $t->getIdTicket();
            return $this->redirectToRoute('index', array('ticket' => 'success', 'nTicket' => $nTicket));
        } else 
        {
            return $this->redirectToRoute('index', array('ticket' => 'error', 'nTicket' => 'none'));
        }
        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/isTicketExists", name="isTicketExists")
     */
    public function isTicketExists(Request $request)
    {
        $number = $request->request->get('number');
        
        if(is_numeric($number) && $number != null)
        {
            $criteria = array('idTicket' => $number);
            $em = $this->getDoctrine()->getManager();
            $result = $em->getRepository('AppBundle\Entity\Ticket')->findBy($criteria);
            $return = NULL;
            
            if($result) 
            {                
                if($result[0]->getStatusTicket() != false) 
                {
                    $return = 'solved';
                    return $this->redirectToRoute('index', array('return' => $return));
                } else if($result[0]->getStatusTicket() != true)  
                {                    
                    $return = 'notsolved';
                    return $this->redirectToRoute('index', array('return' => $return));
                }                
            } 
        }        
        return $this->redirectToRoute('index');      
    }
}