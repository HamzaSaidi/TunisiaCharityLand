<?php

namespace DonBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use DonBundle\Entity\Don;
use DonBundle\Form\DonType;


class DefaultController extends Controller
{

    public function createDonAction(Request $request){
        $don = new Don();
        $form = $this->createForm(DonType::class, $don);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($don->getCategory()->getType() == "Other") {
                $don->getCategory()->setAmount(Null);
            }
            $don->setdonneur($this->getUser());
            $don->setCreatedAt(new \DateTime());
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($don);
            $manager->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('DonBundle:Default:donate.html.twig', ['FormDonation' => $form->createView()]);


    }
}
