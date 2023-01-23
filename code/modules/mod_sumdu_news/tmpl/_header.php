<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_sumdu_news
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<?php if ($module_title || $module_desc) : ?>
	<header class="news__header">
		<?php if ($module_title) : ?>
			<div class="news__header-title">
				<?php echo $module_title; ?>
			</div>
		<?php endif; ?>
		<?php if ($module_desc) : ?>
			<div class="news__header-desc">
				<?php echo $module_desc; ?>
			</div>
		<?php endif; ?>
	</header>
<?php endif; ?>
