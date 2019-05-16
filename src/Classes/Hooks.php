<?php

namespace BohnMedia\ContentShuffleBundle;

class Hooks {
	
	public function compileArticle($objTemplate, $arrData, $objModule) {
				
		$insideWrapper = false;
		$elements = array();
		$elementsShuffled = array();
		$i = 0;
		
		$objCte = \ContentModel::findPublishedByPidAndTable($objModule->id, 'tl_article');
		
		if ($objCte === null) return false;
		
		while ($objCte->next())
		{
			$objRow = $objCte->current();
			
			if ($objRow->type === "shuffle_start")
			{
				if ($insideWrapper) return false;
				$insideWrapper = true;
				array_push($elements, $objModule->Template->elements[$i]);
			}
			else if ($objRow->type === "shuffle_stop")
			{
				shuffle($elementsShuffled);
				$elements = array_merge($elements, $elementsShuffled);
				$elementsShuffled = array();
				$insideWrapper = false;
				array_push($elements, $objModule->Template->elements[$i]);
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