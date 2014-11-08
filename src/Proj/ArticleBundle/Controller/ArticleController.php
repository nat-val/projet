<?php

namespace Proj\ArticleBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction($page)
    {
		if ($page < 1) {
		  // On déclenche une exception NotFoundHttpException, cela va afficher
		  // une page d'erreur 404
		  throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		}
        return $this->render('ProjArticleBundle:Article:index.html.twig');
    }
	
	public function viewAction($id)
    {
        return $this->render('ProjArticleBundle:Article:view.html.twig', array('article_id' => $id));
    }
	
	public function addAction(Request $request)
    {
		$session = $request->getSession();
		$session->getFlashBag()->add('info', 'Article bien enregistré');

		return $this->redirect($this->generateUrl('proj_article_view', array('id' => 5)));
        //return $this->render('ProjArticleBundle:Article:add.html.twig');
    }
	
	public function editAction($id)
    {
        return $this->render('ProjArticleBundle:Article:edit.html.twig', array('article_id' => $id));
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
