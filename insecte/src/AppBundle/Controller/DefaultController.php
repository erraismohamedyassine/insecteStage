<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/afficher/{id}", requirements={"id" = "\d+"}, name="afficher_insecte_page")
     */
    public function afficherAction(Request $request)
    {
        $id = $request->get('id');
        $insecte = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Insecte')
            ->find($id);
        return $this->render('afficher.html.twig', [
            'insecte' => $insecte,
        ]);
    }
    /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/test.html.twig', []);
    }

}
