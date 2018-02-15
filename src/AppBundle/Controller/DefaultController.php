<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\SearchForm;
use AppBundle\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(SearchForm::class);
        
        // lets handle the request 
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $projectTopic = $form->getData();
            
            $projectSearch_array = [];
            // Uncomment bellow line of code for debugging purposes.
            //dump($projectTopic);die;
            
            // We need to get the Projects available form our database
            // and then loop through them to check if their keywords 
            // match what we have from out search string.
            $em = $this->getDoctrine()->getManager();
            $projects = $em->getRepository(Project::class)
                    ->findAll();            
            
            foreach($projects as $project){
               $projectSearch_array[] = [
                 $project->getKeywords()
               ];
            }
            
            $data = ['keywords'=>$projectSearch_array ];
            
            dump($data); die;
            
            
        }
        
        return $this->render('default/index.html.twig', [
            'searchForm'=>$form->createView()
        ]);
    }
    
    /**
     * @Route("/topic/{search_string}", name="search_project_topic")
     * @Method("GET")
     */
    public function searchAction($search_string){
        /**
         * This code helps to search for particular keywords from the search_string
         * in project keywords found inside the database.
         */
        $projectTopic = [];
        
        // Lets get the project entity before we do the comparisons
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository(Project::class)
                ->findAll();
        foreach($project as $topic){
            $projectTopic[] = [
              $topic->getProjectTopic()  
            ];
        }
        $data = [
            'project'=>$projectTopic
        ];
        
        // do the string comparisons
        
        // return a JsonResponse object
        return new JsonResponse($data);        
        
    }
    
    /**
     * @Route("/admin/login", name="log_user_in")
     * @Method("POST")
     */
    public function loginAction(){
        
    }
}
