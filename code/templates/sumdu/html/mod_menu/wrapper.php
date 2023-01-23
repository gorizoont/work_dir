<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use nav instead
?>
<ul class="nav nav--wrapper menu<?php echo $class_sfx; ?> mod-list"<?php echo $id; ?>>
<?php foreach ($list as $i => &$item)
{
	$class = 'nav__item item-' . $item->id;

	if ($item->id == $default_id)
	{
		$class .= ' default';
	}

	if ($item->id == $active_id || ($item->type === 'alias' && $item->params->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type === 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type === 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	if ($item->menu_image) 
	{
		$class .= ' nav__item-wrapper';
	} else {
		$class .= ' nav__item-noimage';
	}

	echo '<li class="' . $class . '">';
	echo $item->menu_image ? '<div class="nav__image-wrapper" style="background-image: url(/' . $item->menu_image . ');">' : '<div class="nav__noimage-wrapper">';

	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'wrapper_' . $item->type);
			break;
		case 'url':
			require JModuleHelper::getLayoutPath('mod_menu', 'wrapper_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'wrapper_component');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="nav-child unstyled small">';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></div></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</div></li>';
	}
}
?>
</ul>

<div class="nav__clear"></div>
