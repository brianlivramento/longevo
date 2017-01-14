<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\User;
use AppBundle\Entity\Order;
use AppBundle\Entity\Ticket;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
	public function indexAction(Request $request, $update = NULL)
    {         
        $session = new Session();       
        $userlogged = $session->get('name');
        
        if($userlogged == 'Administrator')
        {
            $em = $this->getDoctrine()->getManager();
            $filter = $request->query->get('filter_value');
            $pagination = $request->query->get('pag');
            
            $update = $request->query->get('update');
            
            $query1 = $em->createQuery('SELECT COUNT(o) FROM AppBundle\Entity\Order o');        
            $register = $query1->getSingleScalarResult();

            $query2 = $em->createQuery('SELECT COUNT(t.statusTicket) FROM AppBundle\Entity\Ticket t WHERE t.statusTicket = false ');        
            $open = $query2->getSingleScalarResult();

            $query3 = $em->createQuery('SELECT COUNT(t.statusTicket) FROM AppBundle\Entity\Ticket t WHERE t.statusTicket = true ');        
            $solved = $query3->getSingleScalarResult();
                            
            if($filter != null)  
            {
                $query4 = $em->createQuery('SELECT u.nameUser, u.emailUser, o.codOrder, 
                                            t.titleTicket, t.updateDateTicket, t.dateTicket, t.idTicket, t.statusTicket
                                            FROM AppBundle\Entity\Order o
                                            LEFT JOIN AppBundle\Entity\User u
                                            WITH o.idUser = u.idUser 
                                            LEFT JOIN AppBundle\Entity\Ticket t
                                            WITH t.codOrder = o.codOrder
                                            WHERE u.emailUser = :param
                                            OR o.codOrder = :param ');
                $query4->setParameter('param', $filter);
                $list = $query4->getResult();
            } else 
            {                
                $query4 = $em->createQuery('SELECT u.nameUser, u.emailUser, o.codOrder, 
                                            t.titleTicket, t.updateDateTicket, t.dateTicket, t.idTicket, t.statusTicket
                                            FROM AppBundle\Entity\Order o
                                            LEFT JOIN AppBundle\Entity\User u
                                            WITH o.idUser = u.idUser 
                                            LEFT JOIN AppBundle\Entity\Ticket t
                                            WITH t.codOrder = o.codOrder');
                
                if($pagination != null && $pagination == 2) 
                {
                    $list = $query4->setMaxResults(5)->setFirstResult(5)->getResult();
                } else if($pagination != null && $pagination == 100)  
                {
                    $list = $query4->setMaxResults($pagination)->getResult();
                } else {
                    $list = $query4->setMaxResults(5)->getResult();
                }

            }
            $userlogged = 'Administrador';
            return $this->render('admin/admin.twig', array(
                'namesession' => $userlogged,
                'register' => $register,
                'open' => $open,
                'solved' => $solved,
                'list' => $list,
                'update' => $update
            ));
        }        
        return $this->redirectToRoute('login', array('return' => 'notlogin')); 
    }



    /**
     * @Route("/updateTicket", name="updateTicket")
     */
    public function updateTicket(Request $request)
    {        
        $id_ticket = $request->query->get('id_ticket');
        $r = null;
        if($id_ticket != null) 
        {
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(' UPDATE AppBundle\Entity\Ticket t SET t.statusTicket = true, t.updateDateTicket = CURRENT_TIMESTAMP() 
                                        WHERE t.idTicket = ?1');
            $query->setParameter(1, $id_ticket);
            
            if( $query->execute() ) 
            {
               return $this->redirectToRoute('admin', array('update' => 'success'));
               
            } else 
            {
               return $this->redirectToRoute('admin', array('update' => 'error'));                
            }     
        } 
        return $this->redirectToRoute('admin');        
    }
}