<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_sumdu_news
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if ($enable_slider) {
	$news_list_class = 'news__list--slider-wrapper';
}
elseif (!$enable_slider && $columns_count) {
	$news_list_class = 'news__list--columns news__list--columns-' . $columns_count;
}
?>

<section class="news news--wrapper">
	<?php require JModuleHelper::getLayoutPath('mod_sumdu_news', '_header'); ?>

	<?php if (count($list) == 0) : ?>
		<div class="news__no-content">
			<?php echo JText::_('MOD_SUMDU_NEWS_NO_CONTENT'); ?>
		</div>
	<?php else : ?>
		<div class="news__list news__list--wrapper <?php echo $news_list_class; ?>" <?php echo $columns_count ? 'data-news-columns="'.$columns_count.'"' : ''; ?>>
			<?php foreach ($list as $item) : ?>
				<?php require JModuleHelper::getLayoutPath('mod_sumdu_news', '_item-wrapper'); ?>

				<?php if (!$enable_slider && $columns_count && $columns_count != 1 && $list_iterator % $columns_count == 0) : ?>
					<div class="news__clear"></div>
				<?php endif; ?>

				<?php $list_iterator++; ?>

			<?php endforeach; ?>
		</div>
		<div class="news__clear"></div>
		<?php require JModuleHelper::getLayoutPath('mod_sumdu_news', '_footer'); ?>

	<?php endif; ?>
</section>
