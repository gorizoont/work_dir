<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu.helpers
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die; 

class SumduMetaHelper {
   public static function addMetaTags($doc) 
   {
      $plg_content_sumdumeta = JPluginHelper::getPlugin('content', 'sumdumeta');

      if ($plg_content_sumdumeta) {
         $plg_content_sumdumeta_params = new JRegistry($plg_content_sumdumeta->params);

         $current_url = JUri::getInstance();
         $title = $plg_content_sumdumeta_params->get('sumdumeta_title', $doc->getTitle());
         $description = $plg_content_sumdumeta_params->get('sumdumeta_description', $doc->getMetaData("description"));
         $site_type = "website";
         $site_name = $plg_content_sumdumeta_params->get('sumdumeta_sitename', 'SumDU');
         $image_uri = $plg_content_sumdumeta_params->get('sumdumeta_image', false) ? JURI::root(). $plg_content_sumdumeta_params->get('sumdumeta_image') : JURI::root().'plugins/content/sumdumeta/images/logo-sumdu.png';
         $image_alt = $plg_content_sumdumeta_params->get('sumdumeta_image_alt', 'SumDU');
      
         $doc->addCustomTag('<meta property="og:url" content="'. $current_url.'" />');
         $doc->addCustomTag('<meta property="og:title" content="'. $title .'" />');
         $doc->addCustomTag('<meta property="og:description" content="'. $description .'" />');
         $doc->addCustomTag('<meta property="og:type" content="'. $site_type.'" />');
         $doc->addCustomTag('<meta property="og:site_name" content="'. $site_name.'" />');
         $doc->addCustomTag('<meta property="og:image" content="'. $image_uri .'" />');
         $doc->addCustomTag('<meta property="og:image:alt" content="'. $image_alt .'" />');
         $doc->addCustomTag('<meta property="og:determiner" content="auto" />');
         $doc->addCustomTag('<meta property="og:locale" content="uk_UA" />');
         $doc->addCustomTag('<meta property="og:locale:alternate" content="ru_RU" />');
         $doc->addCustomTag('<meta property="og:locale:alternate" content="en_GB" />');
      }
   }
}
