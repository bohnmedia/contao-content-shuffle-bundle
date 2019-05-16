<?php

$GLOBALS['TL_CTE']['shuffle'] = array(
	'shuffle_start' => '\\BohnMedia\\ContentShuffleBundle\\ContentShuffleStart',
	'shuffle_stop' => '\\BohnMedia\\ContentShuffleBundle\\ContentShuffleStop'
);

$GLOBALS['TL_WRAPPERS']['start'][] = 'shuffle_start';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'shuffle_stop';

$GLOBALS['TL_HOOKS']['compileArticle'][] = array('BohnMedia\\ContentShuffleBundle\\Hooks', 'compileArticle');