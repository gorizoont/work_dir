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
		<a class="news__link" href="<?php echo $item->link; ?>">
			<div class="news__image-wrap">
				<div class="news__image news__image--wrapper" style="background-image: url(<?php echo $image_intro; ?>);">
				</div>
				<div class="news__image-gradient">
				</div>
				<?php if ($image_intro_alt != '') : ?>
					<div class="news__image-info">
						<div class="news__image-info-icon">
							<i class="fas fa-info-circle"></i>
						</div>
						<div class="news__image-info-text">
							<?php echo $image_intro_alt; ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="news__title">
					<?php echo $item->title; ?>
				</div>
			</div>
		</a>

		<div class="news__description">
			<?php if ($show_hits) : ?>
				<div class="news__hits">
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
				<?php /* ?>
				<div>
					<a class="news__text-more-link" href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
						<i class="fas fa-ellipsis-h"></i>
					</a>
				</div>
				<?php */ ?>
			<?php endif; ?>
		</div>
	</div>
</div>
