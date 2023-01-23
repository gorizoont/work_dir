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
				<div class="news__image" style="background-image: url(<?php echo $image_intro; ?>);">
				</div>
			</div>
			<div class="news__title">
				<?php echo $item->title; ?>
			</div>
		</a>
	</div>
</div>
