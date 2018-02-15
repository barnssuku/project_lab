<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

/**
 * Description of LoadFixtures
 *
 * @author isreal_zamani
 */
class LoadFixtures implements ORMFixtureInterface{
    public function load(ObjectManager $manager){
        $objects = Fixtures::load(__DIR__.'/fixtures.yml', 
                $manager,
                [
                    'providers' => [$this]
                ]
        );
    }
    
    public function departments(){
        $department = [
            'Mathematics',
            'Physics',
            'Electronics',
            'Biology',
            'Zoology',
            'Botany',
            'Microbiology',
            'Biochemistry',
            'Medicine & Surgery',
            'Law',
            'Economics',
            'Computer Science',
            'Political Science',
            'Management & Entreprenurship',
            'Industrial Chemistry',
            'Chemistry',
            'Statistics'
        ];
        
        $key = array_rand($department);
        return $department[$key];
    }
    
    public function keywords(){
        $keyword = [
          ['Alice', 'very', 'rules'],
          ['never', 'one', 'end'],
          ['show', 'Dinah'],
          ['speaking', 'altogether'],
          ['could', 'found'],
          ['King', 'long', 'low'],
          ['deeply', 'growl', 'concluded'],
          ['Duchess', 'pigs', 'Time'],
          ['shut', 'telescopes', 'maps'],
          ['Turtle', 'Cat', 'never'],
          ['difficulty', 'found', 'thought'],
          ['doubtful', 'whether', 'sneezing'],
          ['finger', 'garden', 'jumped'],
          ['Bill', 'lad'],
          ['two', 'miles', 'added'],
          ['back'],
          ['know'],
          ['solemnly', 'rising', 'children'],
          ['thing', 'with', 'King'],
          ['Knave', 'silent', 'along'],
        ];
        
        $key = array_rand($keyword);
        return $keyword[$key];
    }
}
