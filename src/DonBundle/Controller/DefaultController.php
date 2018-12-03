<?php

namespace DonBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use DonBundle\Entity\Don;
use DonBundle\Form\DonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;


class DefaultController extends Controller
{
    /**
     * @Route("/don")
     * @param Request $request
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $don = new Don();
        $form = $this->createForm(DonType::class, $don);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $don->setdonneur($this->getUser());
            $don->setCreatedAt(new \DateTime());
            $manager=$this->getDoctrine()->getManager();
            $manager->persist($don);
            $manager->flush();
            return $this->redirectToRoute('homepage');
        }


        return $this->render('DonBundle:Default:donate.html.twig', ['FormDonation' => $form->createView()]);
    }
}
