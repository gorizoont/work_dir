<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_popular
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<?php JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php'); ?>
<div class="tagspopular<?php echo $moduleclass_sfx; ?>">
<?php if (!count($list)) : ?>
	<div class="alert alert-no-items"><?php echo JText::_('MOD_TAGS_POPULAR_NO_ITEMS_FOUND'); ?></div>
<?php else : ?>
	<ul>
	<?php foreach ($list as $item) : ?>
	<li>
		<a href="<?php echo JRoute::_(TagsHelperRoute::getTagRoute($item->tag_id . '-' . $item->alias)); ?>">
			<?php echo htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8'); ?></a>
		<?php if ($display_count) : ?>
			<span class="tag-count badge badge-info"><?php echo $item->count; ?></span>
		<?php endif; ?>
	</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>
</div>

<?php /* ?>
<div class="tags-more">
	<?php
	$lang = JFactory::getLanguage();
	$current_lang = $lang->getTag();
	
	if ('uk-UA' == $current_lang) {
		$news_url = '/uk/news.html';
	} else {
		$news_url = '/';
	}
	?>
	
	<a href="<?php echo $news_url;?>" class="btn"><?php echo JText::_('TMPL_SUMDU_TAGS_MORE'); ?></a>
	
</div>
<?php */ ?>