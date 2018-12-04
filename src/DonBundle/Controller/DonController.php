<?php

namespace DonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DonController extends Controller
{
    public function createDonAction()
    {
        return $this->render('DonBundle:Don:create_don.html.twig', array(
            // ...
        ));
    }

    public function showDonAction()
    {
        return $this->render('DonBundle:Don:show_don.html.twig', array(
            // ...
        ));
    }

}
