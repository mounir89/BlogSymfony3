<?php

namespace Mounir\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ArticleType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('date',      DateTimeType::class)
      ->add('titre',     TextType::class)
      ->add('image', FileType::class, array('label' => 'image (img file)',
      'data_class' => null))
      ->add('contenu', CKEditorType::class, array( 'config' => array('uiColor' => '#ffffff',
                      'filebrowserBrowseRoute' => 'elfinder',
                      'filebrowserBrowseRouteParameters' => array(
                          'instance' => 'default',
                          'homeFolder' => ''
                        ),
                        'required'    => true
    )))
      ->add('categorie', EntityType::class, array(
                 'class' => 'MounirBlogBundle:Categorie',
                 'choice_label' => 'nom',
                 'multiple'     => false,
          ))

      ->add('save',      SubmitType::class)
      ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Mounir\BlogBundle\Entity\Article'
    ));
  }
}
