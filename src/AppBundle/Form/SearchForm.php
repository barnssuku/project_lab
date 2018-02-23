<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use AppBundle\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Description of SearchForm
 *
 * @author isreal_zamani
 */
class SearchForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('search_bar', TextType::class, array('label' => false, 
            'attr' => array('class' => 'form-control mr-sm-2 input', 'placeholder' => 'Enter your project topic here to search')))
                ->add('search', SubmitType::class, array('label' => 'Search', 'attr' => array('class' => 'btn btn-outline-primary float-right')));
    }

    /*public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Project::class,
        ));
    }*/

}
