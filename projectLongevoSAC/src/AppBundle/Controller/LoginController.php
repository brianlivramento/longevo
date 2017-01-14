<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller  //.. index  ... loginValidator  ... logout
{


    /**
     * @Route("/login", name="login")
     */
    public function indexAction(Request $request, $return = NULL)
    {
        $return = $request->query->get('return');
        
        return $this->render('login/login.twig', array(
            'return' => $return
        ));
    }   


    /**
     * @Route("/logout", name="logout")
     */
    public function logout(Request $request)
    {
        $session = $request->getSession();
        $session->invalidate();
        return $this->redirectToRoute('login'); 
    }

    /**
     * @Route("/loginValidator", name="loginValidator")
     */
    public function isLoginExists(Request $request)
    {       
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        
        $username = preg_replace('/[^[:alpha:]_]/', '', $username); // Forbidden characters (Se houvesse)
        $password = preg_replace('/[^[:alpha:]_]/', '', $password);
        
        if($username != '' && $password != '') 
        {
            if($username == 'admin' && $password == 'admin')
            {
                $session = new Session();
                $session->set('name', 'Administrator');
                return $this->redirectToRoute('admin');  
            }

        }
        return $this->redirectToRoute('login', array('return' => 'error'));        
    }
}