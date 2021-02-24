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
		$lang = JFactory::getLanguage();
		$direction = $lang->get('rtl');
		
		// add your stylesheet
		$doc->addStyleSheet( JURI :: base().'media/plg_editors_sparky/css/fontawesome.min.css' );
		$doc->addStyleSheet( JURI :: base().'media/plg_editors_sparky/css/sparky_frontend.css' );
		$doc->addScript( JURI :: base().'media/plg_editors_sparky/js/sparky_frontend.js' );

		// /** @var HtmlDocument $doc */
		// $doc = Factory::getApplication()->getDocument();
		// $wa  = $doc->getWebAssetManager();

		// // Add assets
		// $wa->registerAndUseStyle('plg_content_sparkyeditor', 'plugins/content/sparkyeditor/css/sparky_frontend.css')
		//    ->registerAndUseScript('plg_content_sparkyeditor', 'plugins/content/sparkyeditor/js/sparky_frontend.js')
		// ;
		
		// inline style declaration
		if ($direction) {
			$doc->addStyleDeclaration( '
.sparky_page_container {
	flex-direction: row-reverse;
}
			' );
		}

		// Replace colors

		$templateColor[1] = $this->params->def('templateColor1', '');
		$templateColor[2] = $this->params->def('templateColor2', '');
		$templateColor[3] = $this->params->def('templateColor3', '');
		$templateColor[4] = $this->params->def('templateColor4', '');
		$templateColor[5] = $this->params->def('templateColor5', '');
		$templateColor[6] = $this->params->def('templateColor6', '');

		for ($i = 1; $i <= 6; $i++) {

			$templateColor[$i] = $this->params->def('templateColor'.$i, '');

			if ($templateColor[$i]) {

				$color_rgb[$i][0] = hexdec(substr($templateColor[$i], 1, 2));
				$color_rgb[$i][1] = hexdec(substr($templateColor[$i], 3, 2));
				$color_rgb[$i][2] = hexdec(substr($templateColor[$i], 5, 2));

				$color_values = [ $templateColor[$i], "rgb(".$color_rgb[$i][0].", ".$color_rgb[$i][1].", ".$color_rgb[$i][2].")", "rgb(".$color_rgb[$i][0].", ".$color_rgb[$i][1].", ".$color_rgb[$i][2].", 1)" ];

				$article->text = str_replace($color_values, "var(--sparkycolor".$i.")", $article->text);

			}
		}
	}
}