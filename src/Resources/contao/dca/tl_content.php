<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['shuffle_start'] = '{type_legend},type,numberOfContentElements';
$GLOBALS['TL_DCA']['tl_content']['palettes']['shuffle_stop'] = '{type_legend},type';

$GLOBALS['TL_DCA']['tl_content']['fields']['numberOfContentElements'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['numberOfContentElements'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default 0"
);