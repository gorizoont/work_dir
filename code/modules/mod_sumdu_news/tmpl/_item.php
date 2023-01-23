<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_sumdu_news
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$image_obj = json_decode($item->images);
$image_intro = ($image_obj->image_intro != '') ? htmlspecialchars($image_obj->image_intro) : '';
$image_intro_alt = ($image_obj->image_intro_alt != '') ? htmlspecialchars($image_obj->image_intro_alt) : '';
$display_date = JHtml::_('date', $item->displayDate, 'd F Y');
?>

<div class="news__item">
	<div class="news__content">
		<?php if ($show_image) : ?>
			<div class="news__image-wrap">
				<div class="news__image" style="background-image: url(<?php echo $image_intro; ?>);">
					<a class="news__image-link" href="<?php echo $item->link; ?>"></a>
				</div>
			</div>
		<?php else : ?>
			<div class="news__item-separator"></div>
		<?php endif; ?>

		<?php if ($show_counter) : ?>
			<div class="news__counter">
				<?php echo sprintf("%02d", $list_iterator)?>
			</div>
		<?php endif; ?>

		<h3 class="news__title <?php echo $show_shorttext ? '' : 'news__title--light'; ?>">
			<?php if ($item->link !== '') : ?>
				<a class="news__link" href="<?php echo $item->link; ?>">
					<?php echo $item->title; ?>
				</a>
			<?php else : ?>
				<?php echo $item->title; ?>
			<?php endif; ?>
		</h3>

		<?php if ($show_hits) : ?>
			<div class="news__hits">
				<?php /* ?><i class="far fa-eye"></i><?php */ ?>
				<i class="fas fa-glasses"></i><?php echo $item->hits; ?>
			</div>
		<?php endif; ?>
		
		<?php if ($show_date) : ?>
			<div class="news__date"><i class="far fa-calendar"></i>
				<?php echo $display_date; ?>
			</div>
		<?php endif; ?>

		<?php if ($show_shorttext && !empty($item->introtext)) : ?>
			<div class="news__text">
				<?php echo strip_tags($item->introtext); ?>
			</div>
		<?php endif; ?>

	</div>
</div>
