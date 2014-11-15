<?php

namespace Proj\ArticleBundle\Antispam;

class ProjAntispam
{
	private $mailer;
	private $locale;
	private $minLength;
	
	public __construct(\Swift_Mailer $mailer, $locale, $minLength)
	{
		$this->mailer = $mailer;
		$this->locale = $locale;
		$this->minLength = (int) $minLength;
	}
	
	/**
	* Vérifie si le texte est un spam
	*
	* @param string $text
	*@return bool
	*/
	public function isSpam($text)
	{
		return strlen($text) < $this->minLength;
	}
}