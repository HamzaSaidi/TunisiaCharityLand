<?php

namespace TUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="homepage")
     */
    public function indexAction()
    {
        return $this->render('TUserBundle:Default:index.html.twig');
    }
    /**
     * @Route("/about" ,name="about_show")
     */
    public function aboutShow()
    {
        return $this->render('TUserBundle:Default:about.html.twig');



    }

}
