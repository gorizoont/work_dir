<?php 
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Document
JHtml::_('bootstrap.framework');
JHtmlBootstrap::loadCss(false);
unset($this->_scripts[JURI::root(true).'/media/jui/js/bootstrap.min.js']);

// Remove Generator name
$doc->_generator = '';

$app = JFactory::getApplication();
$menu = $app->getMenu()->getActive();

// Tpl SumDU build version
$tpl_sumdu_dev_mod = $enable_dev_mod;
$tpl_sumdu_build = '0.10.1';
$tpl_sumdu_ver = $tpl_sumdu_dev_mod ? $tpl_sumdu_build . '-' . rand(1, 100) : $tpl_sumdu_build;

// Get template params
$site_title = $this->params->get('site_title', JText::_('TPL_SUMDU_FULL_TITLE'));
$site_desc = $this->params->get('site_description', JText::_('TPL_SUMDU_FULL_TITLE'));

$display_sumdu_header = $this->params->get('display_sumdu_header', false);
$fixed_size = $this->params->get('fixed_width', 1);
$sticky_header = $this->params->get('sticky_header', 0);

$show_logo_sumdu = $this->params->get('show_logo_sumdu', 1);
$show_search = $this->params->get('show_search', 1);
$show_all_sumdu = $this->params->get('show_all_sumdu', 1);

$google_analytics_key = $this->params->get('google_analytics_key', false);

$enable_dev_mod = $this->params->get('enable_dev_mod') ? true : false;
$enable_bootstrap_2 = $this->params->get('enable_bootstrap_2', true);
$enable_fontawesome = $this->params->get('enable_fontawesome', true);
$enable_slick = $this->params->get('enable_slick', true);
$enable_slick_lightbox = $this->params->get('enable_slick_lightbox', true);

$doc = JFactory::getDocument();
// Add stylesheets
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/bootstrap2/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/bootstrap2/css/bootstrap-responsive.min.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/slick/slick.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/fontawesome/css/all.min.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu.css?v='.$tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-custom.css?v=' . $tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-responsive.css?v=' . $tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-nav.css?v=' . $tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-module.css?v=' . $tpl_sumdu_ver);
// News Site styles
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-events.css?v='.$tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-news.css?v='.$tpl_sumdu_ver);

// Add scripts
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/vendor/bootstrap2/js/bootstrap.min.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/vendor/slick/slick.min.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/sumdu.js?v='.$tpl_sumdu_ver, 'text/javascript');

if (is_object($menu)) {
	$pageclass = $menu->params->get('pageclass_sfx');
} else {
	$pageclass = '';
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<script src="media/jui/js/jquery.min.js"></script>
	<jdoc:include type="head" />

	<style>
		html, body {
			background-color: #fff;
		}
		.content--raw {
			padding: 0 20px;
		}
	</style>

</head>
<body class="page<?php echo (isset($pageclass) && $pageclass !== '') ? ' page--' . htmlspecialchars($pageclass) : ''; ?>">
	<!-- begin Content -->
	<div class="content content--raw">
		<div class="container">
			<div class="row">
				<div class="span12">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div>
			</div>
		</div>
	</div>
	<!-- end Content -->
</body>
</html>
