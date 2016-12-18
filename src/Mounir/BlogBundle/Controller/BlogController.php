<?php

namespace Mounir\BlogBundle\Controller;


use Mounir\BlogBundle\Entity\Article;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class BlogController extends Controller
{

    public function indexAction(Request $request)
    {
        $listArticles = $this->getDoctrine()
        ->getRepository('MounirBlogBundle:Article')
        ->findBy(array(),array('date' => 'desc'));


        $paginator  = $this->get('knp_paginator');

           $result = $paginator->paginate(
               $listArticles,
               $request->query->getInt('page', 1),
               $request->query->getInt('limit', 6)
             );

        return $this->render('MounirBlogBundle:Blog:index.html.twig', array(
          'listArticles' =>  $result
        ));

    }

    public function viewAction($slug)
    {
        $article = $this->getDoctrine()
          ->getRepository('MounirBlogBundle:Article')
          ->findOneBy(array(
            'slug' => $slug
          ));

          if (!$article) {
              throw $this->createNotFoundException(
              'No article found for slug '.$slug
            );
          }

        return $this->render('MounirBlogBundle:Blog:view.html.twig',array(
          'article' => $article
        ));

    }
}
