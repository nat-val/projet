<?php

namespace Proj\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticleFocus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proj\ArticleBundle\Entity\ArticleFocusRepository")
 */
class ArticleFocus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="level", type="string", length=255)
     */
    private $level;

		/**
		 * @var \Proj\ArticleBundle\Entity\Article
		 *
		 * @ORM\ManyToOne(targetEntity="Proj\ArticleBundle\Entity\Article")
		 * @ORM\JoinColumn(nullable=false)
		 */
		private $article;
		
		/**
		 * @var \Proj\ArticleBundle\Entity\Focus
		 *
		 * @ORM\ManyToOne(targetEntity="Proj\ArticleBundle\Entity\Focus")
		 *@ORM\JoinColumn(nullable=false)
		 */
		private $focus; 
		 
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set level
     *
     * @param string $level
     * @return ArticleFocus
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set article
     *
     * @param \Proj\ArticleBundle\Entity\Article $article
     * @return ArticleFocus
     */
    public function setArticle(\Proj\ArticleBundle\Entity\Article $article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \Proj\ArticleBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set focus
     *
     * @param \Proj\ArticleBundle\Entity\Focus $focus
     * @return ArticleFocus
     */
    public function setFocus(\Proj\ArticleBundle\Entity\Focus $focus)
    {
        $this->focus = $focus;

        return $this;
    }

    /**
     * Get focus
     *
     * @return \Proj\ArticleBundle\Entity\Focus 
     */
    public function getFocus()
    {
        return $this->focus;
    }
}
