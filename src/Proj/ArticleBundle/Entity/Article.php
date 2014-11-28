<?php

namespace Proj\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="Proj\ArticleBundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Article
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
		
		/**
		* @var boolean
		*
		*@ORM\Column(name="published", type="boolean")
		*/
		private $published = false;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;
		
		/**
		 * @var \Proj\ArticleBundle\Entity\Image
		 *
		 * @ORM\OneToOne(targetEntity="Proj\ArticleBundle\Entity\Image", cascade={"persist"})
		 */
		private $image;

		/**
		 * @var \Doctrine\Common\Collections\Collection
		 *
		 * @ORM\ManyToMany(targetEntity="Proj\ArticleBundle\Entity\Category", cascade={"persist"})
		 */
		private $categories;

		/**
		 * @var \Doctrine\Common\Collections\Collection
		 *
		 * @ORM\OneToMany(targetEntity="Proj\ArticleBundle\Entity\Comment", mappedBy="article")
		 */
		private $comments;
		
		/**
		 * @var \DateTime
		 *
		 * @ORM\Column(name="updated_date", type="datetime", nullable=true)
		 */
		private $updatedDate;

		/**
		 * @var string
		 *
		 * @Gedmo\Slug(fields={"title"})
		 * @ORM\Column(length=128, unique=true)
		 */
		private $slug; 

		public function __construct()
		{
			// par défaut date de l'article est le jour même
			$this->date = new \Datetime();
		} 
		
		/**
		 * @ORM\PreUpdate
		 */
		public function updateDate()
		{
			$this->setUpdatedDate(new \Datetime());
		}		
		
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
     * Set date
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Article
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Article
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set image
     *
     * @param \Proj\ArticleBundle\Entity\Image $image
     * @return Article
     */
    public function setImage(\Proj\ArticleBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Proj\ArticleBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add category
     *
     * @param \Proj\ArticleBundle\Entity\Category $category
     * @return Article
     */
    public function addCategory(\Proj\ArticleBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Proj\ArticleBundle\Entity\Category $category
     */
    public function removeCategory(\Proj\ArticleBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add comment
     *
     * @param \Proj\ArticleBundle\Entity\Comment $comment
     * @return Article
     */
    public function addComment(\Proj\ArticleBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;
				
				// on lie l'article au commentaire
				$comment->setArticle($this);

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Proj\ArticleBundle\Entity\Comment $comment
     */
    public function removeComment(\Proj\ArticleBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set updatedDate
     *
     * @param \DateTime $updatedDate
     * @return Article
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    /**
     * Get updatedDate
     *
     * @return \DateTime 
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Article
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
