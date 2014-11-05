<?php

namespace Proj\ArticleBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction()
    {
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
}
