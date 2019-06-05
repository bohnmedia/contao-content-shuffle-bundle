<?php

namespace BohnMedia\ContentShuffleBundle;

class Hooks {
	
	public function compileArticle($objTemplate, $arrData, $objModule) {
				
		$insideWrapper = false;
		$elements = array();
		$elementsShuffled = array();
		$i = 0;
		$maxlength = 0;
		
		
		$objCte = \ContentModel::findPublishedByPidAndTable($objModule->id, 'tl_article');
		
		if ($objCte === null) return false;
		
		while ($objCte->next())
		{
			$objRow = $objCte->current();
			
			if ($objRow->type === "shuffle_start")
			{
				if ($insideWrapper) return false;
				$insideWrapper = true;
				$maxlength = (int)$objRow->numberOfContentElements;
				array_push($elements, $objModule->Template->elements[$i]);
			}
			else if ($objRow->type === "shuffle_stop")
			{
				// SHUFFLE ELEMENTS
				shuffle($elementsShuffled);
				
				// SLICE ELEMENTS
				if ($maxlength) $elementsShuffled = array_slice($elementsShuffled, 0, $maxlength);
					
				// MERGE SHUFFLED ELEMENTS
				$elements = array_merge($elements, $elementsShuffled);
				
				array_push($elements, $objModule->Template->elements[$i]);
				$elementsShuffled = array();
				$insideWrapper = false;
			}
			else if ($insideWrapper)
			{
				array_push($elementsShuffled, $objModule->Template->elements[$i]);
			}
			else
			{
				array_push($elements, $objModule->Template->elements[$i]);
			}
			
			$i++;
		}

		if (!$insideWrapper)
		{
			$objModule->Template->elements = $elements;
		}

	}
}