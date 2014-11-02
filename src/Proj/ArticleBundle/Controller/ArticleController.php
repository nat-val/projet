<?php

namespace Proj\ArticleBundle\Controller;

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
	
	 public function addAction()
    {
        return $this->render('ProjArticleBundle:Article:add.html.twig');
    }
}
