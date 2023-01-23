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
		<div class="news__image-wrap">
			<a class="news__link" href="<?php echo $item->link; ?>">
				<div class="news__image" style="background-image: url(<?php echo $image_intro; ?>);">
					<div class="news__image-gradient"></div>
				</div>
				<div class="news__photo-icon">
					<i class="fas fa-images"></i>
				</div>
			</a>

			<div class="news__description">
				<div class="news__title">
					<?php if ($item->link !== '') : ?>
						<a class="news__link" href="<?php echo $item->link; ?>">
							<?php echo $item->title; ?>
						</a>
					<?php else : ?>
						<?php echo $item->title; ?>
					<?php endif; ?>
				</div>

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
			</div>
		</div>

		<div class="news__image_underline news__image_underline--1"></div>
		<div class="news__image_underline news__image_underline--2"></div>
		<div class="news__image_underline news__image_underline--3"></div>

	</div>
</div>
