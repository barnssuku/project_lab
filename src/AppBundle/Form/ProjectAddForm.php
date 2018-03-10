<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
/**
 * Description of ProjectAddForm
 *
 * @author isreal_zamani
 */
class ProjectAddForm extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('project_title', TextType::class, array('label'=>'Project Title', 'attr'=>array('class'=>'', 'placeholder'=>'Enter the project topic...')))
                ->add('keywords', TextType::class, array('label'=>'Project Keywords', 'attr'=>array('class'=>'', 'placeholder'=>'Enter keywords seperated by spaces')))
                ->add('except', FileType::class, array('label'=>'Upload Abstract', 'attr'=>array('class'=>'')))
                ->add('date_written', DateType::class, array('label'=>'Date', 'attr'=>array('class'=>'')))
                ->add('content', FileType::class, array('label'=>'Chapter Content', 'attr'=>array('class'=>'')))
                ->add('department', TextType::class, array('label'=>'Department', 'attr'=>array('class'=>'', 'placeholder'=>'Enter your department...')));
    }
    
    
}
