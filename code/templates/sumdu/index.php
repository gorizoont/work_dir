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
$doc = JFactory::getDocument();
$app = JFactory::getApplication();
$menu = $app->getMenu()->getActive();
$root_url = JURI::root();
$current_url = JUri::getInstance();
$current_lang = JFactory::getLanguage();
$current_page_view = JRequest::getVar("view");
$pageclass = '';

// Remove Generator name
$doc->_generator = '';

// Tpl SumDU build version
$tpl_sumdu_build = '0.10.1';
$tpl_sumdu_ver = $this->params->get('enable_dev_mod', 0) ? $tpl_sumdu_build . '-' . rand(100, 1000) : $tpl_sumdu_build;

// Bootstrap settings - Ignore Global
JHtml::_('bootstrap.framework');
JHtmlBootstrap::loadCss(false);
unset($this->_scripts[JURI::root(true).'/media/jui/js/bootstrap.min.js']);

// Output as HTML5
$this->setHtml5(true);

// Global settings
$sitename = JFactory::getConfig()->get('sitename');

// Template params
// Basic
$site_logo = $this->params->get('site_logo', false);
$site_title = $this->params->get('site_title', false);
$site_desc = $this->params->get('site_description', false);

// Display settings
$show_sumdu_header = $this->params->get('show_sumdu_header', false);
$show_logo_sumdu = $this->params->get('show_logo_sumdu', 1);
$show_documents = $this->params->get('show_documents', 1);
$show_all_sumdu = $this->params->get('show_all_sumdu', 1);

$fixed_size = $this->params->get('fixed_width', 1);
$sticky_header = $this->params->get('sticky_header', 0);
$show_search = $this->params->get('show_search', 1);


// Libs
$enable_dev_mod = $this->params->get('enable_dev_mod', true);
$enable_bootstrap_2 = $this->params->get('enable_bootstrap_2', true);
$enable_fontawesome = $this->params->get('enable_fontawesome', true);
$enable_slick = $this->params->get('enable_slick', true);
$enable_slick_lightbox = $this->params->get('enable_slick_lightbox', true);

// Google Analytics
$google_analytics_key = $this->params->get('google_analytics_key', false);
$google_analytics_linker_domains = $this->params->get('google_analytics_linker_domains', false);
$google_tag_manager_key = $this->params->get('google_tag_manager_key', false);

if (is_object($menu)) {
	$pageclass = $menu->params->get('pageclass_sfx');
}

// Workaround to OG Tags for view == "featured"
if ($current_page_view == "featured") {
	require_once(__DIR__ . '/helpers/sumdu_meta_helper.php');
	SumduMetaHelper::addMetaTags($doc);
}

// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

if ($this->params->get('enable_jquery', false)) {
	// jQuery script
	// Load defaul jQuery lib <script src="media/jui/js/jquery.min.js"></script>
	// $doc->addScript($this->baseurl.'/media/jui/js/jquery.min.js', 'text/javascript');
}

if ($this->params->get('enable_bootstrap_2', false)) {
	// Bootstrap styles
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/bootstrap2/css/bootstrap.min.css');
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/bootstrap2/css/bootstrap-responsive.min.css');
	// Bootstrap scripts
	$doc->addScript($this->baseurl.'/templates/'.$this->template.'/vendor/bootstrap2/js/bootstrap.min.js', 'text/javascript');
}

if ($this->params->get('enable_fontawesome', false)) {
	// FontAwesome styles
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/fontawesome/css/all.min.css');
}

if ($this->params->get('enable_slick', false)) {
	// Slick styles
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/slick/slick.css');
	// Slick scripts
	$doc->addScript($this->baseurl.'/templates/'.$this->template.'/vendor/slick/slick.min.js', 'text/javascript');
}

if ($this->params->get('enable_slick_lightbox', false)) {
	// Slick-lightbox styles
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/slick-lightbox/dist/slick-lightbox.css');
	// Slick-lightbox scripts
	$doc->addScript($this->baseurl.'/templates/'.$this->template.'/vendor/slick-lightbox/dist/slick-lightbox.min.js');
}
if ($this->params->get('enable_animate_css', false)) {
	// Aminate.css styles
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/vendor/animate-css/animate.min.css');
}

// ====================
// SumDU tmpl Configuration
// ====================
// SumDU styles
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu.css?v='.$tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-nav.css?v=' . $tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-module.css?v=' . $tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-responsive.css?v=' . $tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-header.css?v=' . $tpl_sumdu_ver);
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-custom.css?v=' . $tpl_sumdu_ver);
// SumDU scripts
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/sumdu.js?v='.$tpl_sumdu_ver, 'text/javascript');

if ($this->params->get('sumdu_theme', 'basic') !== 'basic') {
	// SumDU Theme Styles
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-theme.css?v='.$tpl_sumdu_ver);
}

if ($this->params->get('enable_news_style', false)) {
	// News styles
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-news.css?v='.$tpl_sumdu_ver);
}

if ($this->params->get('enable_events_style', false)) {
	// Events styles
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-events.css?v='.$tpl_sumdu_ver);
}

if ($this->params->get('enable_ranking_style', false)) {
	// Ranking styles
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-ranking.css?v=' . $tpl_sumdu_ver);
}

if ($this->params->get('enable_jcomments_style', false)) {
	// jComments
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/sumdu-jcomments.css?v='.$tpl_sumdu_ver);
}

if ($this->params->get('enable_custom_style', false) && $this->params->get('custom_style', false)) {
	// Custom CSS
	$this->addStyleDeclaration($this->params->get('custom_style', false));
}

// Google Analytict
if ($google_analytics_key) {
	if ($google_analytics_linker_domains) {
		// String Example: 
		// sumdu.edu.ua, vstup.sumdu.edu.ua
		$google_analytics_linker_domains_arr = explode(',', $google_analytics_linker_domains);
		$google_analytics_linker_domains_result_arr = [];
		foreach ($google_analytics_linker_domains_arr as $domain_item_value) {
			$google_analytics_linker_domains_result_arr[] = "'" . trim($domain_item_value) . "'";
		}
		$google_analytics_linker_domains_result_str = implode(', ', $google_analytics_linker_domains_result_arr);

		$google_analytics_linker_domains_js = ", {
			'linker': {
				'domains': [$google_analytics_linker_domains_result_str]
				}
		}";
	} else {
		$google_analytics_linker_domains_js = "";
	}
	$google_analytics_js = "
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '$google_analytics_key'$google_analytics_linker_domains_js);
	";
	$doc->addScript("https://www.googletagmanager.com/gtag/js?id=" . $google_analytics_key, 'text/javascript', false, true);
	$this->addScriptDeclaration($google_analytics_js);
}
// Google Tag Manager
if ($google_tag_manager_key) {
	$google_tag_manager_js = "
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','$google_tag_manager_key');
	";
	$this->addScriptDeclaration($google_tag_manager_js);
}
?>

<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<jdoc:include type="head" />
</head>
<body class="theme-<?php echo $this->params->get('sumdu_theme', 'basic'); ?> page<?php echo $pageclass ? ' page--'.htmlspecialchars($pageclass) : ''; echo ' page--'.$current_page_view; ?>">

<?php if ($google_tag_manager_key) : ?>
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $google_tag_manager_key; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php endif; ?>

<?php require_once(__DIR__ . '/positions/main.php'); ?>

</body>
</html>
