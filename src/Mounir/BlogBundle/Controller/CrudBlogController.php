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

use Symfony\Component\Form\Form;


class CrudBlogController extends BlogController
{

  public function adminAction(Request $request)
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

      return $this->render('MounirBlogBundle:Admin:indexadmin.html.twig', array(
        'listArticles' => $result
      ));

  }

  public function addAction(Request $request)
  {

    $article = new Article;

    $form = $this->createForm('Mounir\BlogBundle\Form\ArticleType', $article);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

         /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
           $file = $article->getImage();

           // Generate a unique name for the file before saving it
           $fileName = md5(uniqid()).'.'.$file->guessExtension();

           // Move the file to the directory where brochures are stored
           $file->move(
               $this->getParameter('images_directory'),
               $fileName
           );

           // Update the 'brochure' property to store the PDF file name
           // instead of its contents
           $article->setImage($fileName);

           $em = $this->getDoctrine()->getManager();

           $em->persist($article);

           $em->flush();

           $request->getSession()->getFlashBag()->add('notice', 'Article bien enregistré.');

      return $this->redirectToRoute('Mounir_blog_view', array('slug' => $article->getSlug()));

    }
    return $this->render('MounirBlogBundle:Admin:add.html.twig',array(
      'form' => $form->createView()
    ));
  }

public function editAction(Request $request, $slug)
{
      $em = $this->getDoctrine()->getManager();
      $article = $em->getRepository('MounirBlogBundle:Article')->findOneBy(array(
        'slug' => $slug
      ));

      $form = $this->createForm('Mounir\BlogBundle\Form\ArticleTypeEdit', $article);

      $form->handleRequest($request);


      if ($form->isSubmitted()) {

          $em->persist($article);

          $em->flush();

          return $this->render('MounirBlogBundle:Blog:view.html.twig',array(
            'article' => $article
          ));
      }

  return $this->render('MounirBlogBundle:Admin:edit.html.twig',array(
    'article' => $article,
    'form' => $form->createView()
  ));

}
public function deleteAction(Article $article, Request $request)
{

  $form = $this->createFormBuilder()->getForm();

  if ($request->getMethod() == 'POST') {

      $form->handleRequest($request);

     if ($form->isValid()) {

      $em = $this->getDoctrine()->getManager();
      $em->remove($article);
      $em->flush();

      return $this->redirect($this->generateUrl('Mounir_blog_admin'));
    }
  }
  // Si la requÃªte est en GET, on affiche une page de confirmation avant de supprimer
  return $this->render('MounirBlogBundle:Admin:delete.html.twig', array(
    'article' => $article,
    'form'    => $form->createView()
  ));

}
public function ListCategorieAction(Request $request){

  $repository = $this->getDoctrine()->getManager()->getRepository('MounirBlogBundle:Categorie');

  $listCategorie = $repository->getListCategorie();

  return $this->render('MounirBlogBundle:Admin:categorie.html.twig', array(
    'listCategorie' => $listCategorie
  ));
}



}
