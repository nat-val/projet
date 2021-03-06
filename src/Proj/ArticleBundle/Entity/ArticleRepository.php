<?php

namespace Proj\ArticleBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{
	// retourne les articles avec leur catégories
	public function getArticleWithCategories(array $categoryNames)
	{
		$qb = $this->createQueryBuilder("a")
			->leftJoin('a.categories', 'cat')
			->addSelect('cat');
		// on ajoute les filtres sur les noms de catégories
		$qb->where($qb->exp()->in('cat.name', $categoryNames));
		
		return $qb
			->getQuery()
			->getResult();
	}
}
