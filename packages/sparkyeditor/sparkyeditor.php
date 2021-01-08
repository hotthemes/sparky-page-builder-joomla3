<?php
/*------------------------------------------------------------------------
# "Responsive Lightbox" Joomla plugin
# Copyright (C) 2015 HotThemes. All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Author: HotJoomlaTemplates.com
# Website: http://www.hotjoomlatemplates.com
-------------------------------------------------------------------------*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// use Joomla\CMS\Factory;

jimport('joomla.plugin.plugin');

class plgContentSparkyEditor extends JPlugin
{

	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
		
		// adding CSS and JS in head
		$doc = JFactory::getDocument();
		
		// add your stylesheet
		$doc->addStyleSheet( JURI :: base().'media/editors/sparky/css/fontawesome.min.css' );
		$doc->addStyleSheet( JURI :: base().'media/editors/sparky/css/sparky_frontend.css' );
		$doc->addScript( JURI :: base().'media/editors/sparky/js/sparky_frontend.js' );

		// /** @var HtmlDocument $doc */
		// $doc = Factory::getApplication()->getDocument();
		// $wa  = $doc->getWebAssetManager();

		// // Add assets
		// $wa->registerAndUseStyle('plg_content_sparkyeditor', 'plugins/content/sparkyeditor/css/sparky_frontend.css')
		//    ->registerAndUseScript('plg_content_sparkyeditor', 'plugins/content/sparkyeditor/js/sparky_frontend.js')
		// ;

		// allow multiple galleries on a page
		$UniqueNo = rand();
		
		// style declaration
		$doc->addStyleDeclaration( '

			#responsivelightbox'.$UniqueNo.' {
			}

		' );
		
	}
}