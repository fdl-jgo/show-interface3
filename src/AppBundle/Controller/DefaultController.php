<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {

        /*$product = $this->getDoctrine()
        ->getRepository('AppBundle:Product')
        ->find($productId);*/
        

        return $this->render(
            'AppBundle:Default:index.html.twig',
            array(
            )
        );
    }

    public function courslistAction()
    {

        $courses = $this->getDoctrine()
        ->getRepository('AppBundle:Cours')
        ->getOrderCoursList();
        
        return $this->render(
        	'AppBundle:Default:courslist.html.twig',
        	array(
                'courses' => $courses
        	)
        );
    }

    public function coursAction($crs)
    {

        $participants = $this->getDoctrine()
        ->getRepository('AppBundle:ParticipationsCours')
        ->getParticipants($crs);

        return $this->render(
            'AppBundle:Default:cours.html.twig',
            array(
                'participants' => $participants
            )
        );
    }

    // retourne json 
    public function validpresenceAction(Request $request)
    {
        $idp = $request->request->get('idpart');
        $idc = $request->request->get('idcours');
        
        $present = $this->getDoctrine()
        ->getRepository('AppBundle:ParticipationsCours')
        ->setPresent($idp, $idc);

        return  $this->json(array('var' => $present));        
    }
}
