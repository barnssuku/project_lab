<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\SearchForm;
use AppBundle\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\proj_app_objects\ProjectTopicSearchUtility;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    /* The indexAction controller, apart from being the controller for the 
     * home page, it shall also server as the main search page for any project
     * topic entered.
     * 
     */
    public function indexAction(Request $request) {
        $form = $this->createForm(SearchForm::class);

        // lets handle the request 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // The string collected from our search input textfield.
            $projectTopic = $form->getData();
            
            // Collect our Project objects from the database to loop through its 
            // keywords array.
            $em = $this->getDoctrine()->getManager();
            $projects = $em->getRepository(Project::class)
                    ->findAll();
            
            // Create our utility object to help us out here.
            $pTSU = new ProjectTopicSearchUtility();
            
            // Assign its returned value into the new array for delivery to the 
            // view.            
            $matchingProject = $pTSU->matchProjectTopic($projects, $projectTopic['search_bar']);
            
            // DEBUGGING GODE ----REMEMBER TO REMOVE THIS.
            dump($matchingProject);
            die;
        }

        return $this->render('default/index.html.twig', [
                    'searchForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/topic/{search_string}", name="search_project_topic")
     * @Method("GET")
     */
    public function searchAction($search_string) {
        
    }

    /**
     * @Route("/admin/login", name="log_user_in")
     * @Method("POST")
     */
    public function loginAction() {
        
    }

}
