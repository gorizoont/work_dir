<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_sumdu_news
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Mod version
$mod_sumdu_news_dev_mod = false;
$mod_sumdu_news_build = '0.10.0';
$mod_sumdu_news_ver = $mod_sumdu_news_dev_mod ? $mod_sumdu_news_build . '-' . rand(1, 100) : $mod_sumdu_news_build;

// $mod_uri = JURI::base() . '/modules/'. $module->module;
$mod_uri = JURI::root(true) . '/modules/'. $module->module;
$doc = JFactory::getDocument();

// Add style
// $doc->addStyleSheet($mod_uri . '/vendor/slick/slick.css');
// $doc->addStyleSheet($mod_uri . '/vendor/fontawesome/css/all.min.css');
$doc->addStyleSheet($mod_uri . '/css/mod-sumdu-news.css?v=' . $mod_sumdu_news_ver);

// Add scripts
// $doc->addScript($mod_uri . '/vendor/slick/slick.min.js', 'text/javascript');
$doc->addScript($mod_uri . '/js/mod-sumdu-news.js?v=' . $mod_sumdu_news_ver, 'text/javascript');

// Include the news functions only once
JLoader::register('ModSumduNewsHelper', __DIR__ . '/helper.php');
// Include Fields
JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');

$list = ModSumduNewsHelper::getList($params);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$bootstrap_size = $params->get('bootstrap_size', 12);

$module_title = $params->get('module_title', false);
$module_desc = $params->get('module_desc', false);

$more_text = $params->get('more_text');
$more_link = $params->get('more_link', false);
$more_target = $params->get('more_target') == '1' ? '_blank' : '_self';

$enable_slider = $params->get('enable_slider', false);
$columns_count = $params->get('columns_count', false);
$show_image = $params->get('show_image');
$show_title = $params->get('show_title');
$show_shorttext = $params->get('show_shorttext');
$show_counter = $params->get('show_counter');
$show_date = $params->get('show_date');
$show_hits = $params->get('show_hits');
$news_list_class = '';
$list_iterator = 1;

if (($columns_count && count($list) <= $columns_count) || (!$enable_slider && $columns_count)) {
	$news_list_class = 'news__list--columns news__list--columns-' . $columns_count;
}
elseif ($enable_slider) {
	$news_list_class = 'news__list--slider';
}

require JModuleHelper::getLayoutPath('mod_sumdu_news', $params->get('layout', 'default'));
