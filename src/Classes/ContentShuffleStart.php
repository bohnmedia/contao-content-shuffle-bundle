<?php

namespace BohnMedia\ContentShuffleBundle;

class ContentShuffleStart extends \ContentElement
{
	/**
	 * @var string Template
	 */
	protected $strTemplate = 'ce_shuffle_start';

	/**
	 * Compile the content element
	 *
	 * @return void
	 */
	public function compile()
	{
		if (TL_MODE == 'BE') {
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = $this->headline;
		}
	}
}