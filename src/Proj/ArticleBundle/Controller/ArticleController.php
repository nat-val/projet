<?php

namespace Proj\ArticleBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proj\ArticleBundle\Entity\Article;

class ArticleController extends Controller
{
    public function indexAction($page)
    {
		if ($page < 1) {
		  // On déclenche une exception NotFoundHttpException, cela va afficher
		  // une page d'erreur 404
		  throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		}
        return $this->render('ProjArticleBundle:Article:index.html.twig', array('articles_list' => array()));
    }
	
	public function viewAction($id)
	{
		// on récupère le repository
		$repository = $this->getDoctrine()->getManager()->getRepository('ProjArticleBundle:Article');
		// on récupère l'entité correspondante à l'id
		$article = $repository->find($id);
		if($article === null)
		{
			throw new NotFoundHttpException("Cet article n'existe pas.");
		}
		return $this->render('ProjArticleBundle:Article:view.html.twig', array('article' => $article));
	}
	
	public function addAction(Request $request)
	{
		// création de l'article
		$article = new Article();
		$article->setTitle('La couleur bleue');
		$article->setAuthor('Titi');
		$article->setContent("La couleur bleue est une couleur tr&egrave;s particuli&egrave;re. C'est la couleur du ciel quand il fait beau !");
		// on récupère l'EntityManager
		$em = $this->getDoctrine()->getManager();
		// on persiste
		$em->persist($article);
		// on "flush"
		$em->flush();
		
		if($request->isMethod('POST'))
		{
			$session = $request->getSession();
			$session->getFlashBag()->add('info', 'Article bien enregistré');
			return $this->redirect($this->generateUrl('proj_article_view', array('id' => $article->getId())));
		}
		
		return $this->render('ProjArticleBundle:Article:add.html.twig');
	}
	
	public function editAction($id)
	{
		$article = array('id' => $id, 'title' => 'mon article', 'content' => 'contenu de l\'article', 'author' => 'moi-meme', 'date' => new \Datetime());
		return $this->render('ProjArticleBundle:Article:edit.html.twig', array('article' => $article));
	}
	
	public function deleteAction($id)
	{
		return $this->render('ProjArticleBundle:Article:delete.html.twig', array('article_id' => $id));
	}
	
	public function menuAction()
	{
		$articles_list = array(
			array('id' => 2, 'title' => 'La recette de la brioche'),
			array('id' => 5, 'title' => "L'arc en ciel"),
			array('id' => 9, 'title' => 'Astronomie pour débutant')
		);
		return $this->render('ProjArticleBundle:Article:menu.html.twig', array('articles_list' => $articles_list));
	}
}
