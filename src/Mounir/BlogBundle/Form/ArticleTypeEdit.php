<?php

namespace Mounir\BlogBundle\Form;



use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleTypeEdit extends ArticleType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    parent::buildForm($builder, $options);

    $builder
            ->remove('date')
            ->remove('image')
    ;
  }

  public function getName()
  {
     return 'Mounir_blogbundle_articleedittype';
  }

}
