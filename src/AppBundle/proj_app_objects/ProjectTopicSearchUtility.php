<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\proj_app_objects;

use AppBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * ProjectTopicSearchUtility class is conceived out of the need to package all
 * utility functions the Project Web Application shall require to work properly.
 *
 * @author isreal_zamani
 */
class ProjectTopicSearchUtility extends Controller{
    
    public function __construct() {        
    }
    
    /**
     * matchProjectTopic() function will take a string (i.e a project topic and search
     * through its string for one or more matching keywords we shall be collecting
     * from the database.
     * 
     * @param Project $projectTopic The first variable in the project entity class.
     * @return array A full or null array with Project types.
     */
    public function matchProjectTopic($projects, $projectTopic){
        // Setup the array variable to hold the matching project topics.
        $matchingProjects = [];
        
        // We need to make sure we are not collecting an empty array.
        if($projects == null){
            return $matchingProjects;
        }
        
        // Loop through the collected projects array
        foreach($projects as $project){
            $keywords = $project->getKeywords();
            // Set up how many keywords we have a match for on the collected 
            // string, a $count variable will do the counting for us.
            $count = 0;
            // Loop through the collected keywords array
            foreach($keywords as $keyword){
                $count += substr_count($projectTopic, $keyword);
            }
            // If count is greater than 1 we add this projects into our array
            // and return it.
            if($count >= 1){
                // push this project into the array, its position will be at the
                // rear.
                array_push($matchingProjects, $project);
            }
        }
        
        // We return our filled array 
        return $matchingProjects;
        
    }
    
    /**
     * This function shall help to clean-up the data collected from the form in
     * other to have it in the proper way we need for it to be inserted into the 
     * database.
     * 
     * @param array $addedProject 
     * @return Project a cleaned and arranged Project object.
     */
    public function cleanInputData($addedProject) {
        $project = new Project();
        
        if ($addedProject == null){
            return $project;
        }
        
        // Collect all the values inside the form object
        $projectTitle = $addedProject['project_title'];
        $keywords = $addedProject['keywords'];
        $excepts = $addedProject['excepts'];
        $date_written = $addedProject['date'];
        $content = $addedProject['content'];
        $department = $addedProject['department'];
        
        // Trim the $projectTitle and add
        trim($projectTitle);
        $project->setProjectTopic($projectTitle);
        
        // Turn keywords into array of keywords
        trim($keywords);
        $array_keywords = explode(" ", $keywords);
        $project->setKeywords($array_keywords);
        
        // Push in the rest of the values gotten.        
        $project->setExcept(($excepts));
        $project->setDateWritten(($date_written));
        $project->setContent(($content));
        $project->setDepartment(($department));
        
        // return the filed array
        return $project;
        
    }
}
