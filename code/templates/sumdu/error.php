<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$this->language = $doc->language;
$sitename = JFactory::getConfig()->get('sitename');

// Tpl SumDU build version
$tpl_sumdu_dev_mod = false;
$tpl_sumdu_build = '0.10.1';
$tpl_sumdu_ver = $tpl_sumdu_dev_mod ? $tpl_sumdu_build . '-' . rand(1, 100) : $tpl_sumdu_build;

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title><?php echo $this->title; ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>

	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/vendor/bootstrap2/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/vendor/bootstrap2/css/bootstrap-responsive.min.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/vendor/fontawesome/css/all.min.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/sumdu.css?v=<?php echo $tpl_sumdu_ver; ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/sumdu-responsive.css?v=<?php echo $tpl_sumdu_ver; ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/sumdu-404.css?v=<?php echo $tpl_sumdu_ver; ?>" type="text/css" />
</head>
<body class="page page--error">
	<section class="wrapper wrapper--fixed">
		<header class="error-header">
			<div><?php echo $sitename; ?></div>
		</header>
		<!-- begin Content -->
		<section class="content content--error">
			<div class="container-fluid">
				<div class="row-fluid">
					<main class="offset4 span6">
						<p><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/404-error.jpg?v=<?php echo $tpl_sumdu_ver; ?>" alt="404-error"></p>
						<h1>
							<?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
						</h1>
						<p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
						<ol>
							<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
						</ol>
						<p><strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></strong></p>
						<ul>
							<li><a href="<?php echo JUri::root(true); ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></li>
						</ul>
						<p>
							<?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?>
						</p>
						
					</main>
				</div>
			</div>
		</section>
		<!-- end Content -->
		<!-- begin copyright -->
		<section class="copyright">
			<div class="container-fluid">
				<div class="copyright__text">
					<p>
						© <?php echo date("Y"); ?> <?php echo JText::_('TPL_SUMDU_COPYRIGHT'); ?>
					</p>
					<p>Design & Develop by <a href="//web.sumdu.edu.ua" target="_blank" title="Center of Web-development">web.sumdu.edu.ua</a></p>
				</div>
			</div>
		</section>
		<!-- end copyright -->
	</section>
</body>
</html>
