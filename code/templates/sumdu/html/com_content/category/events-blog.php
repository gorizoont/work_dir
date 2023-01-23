<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');

$dispatcher = JEventDispatcher::getInstance();

$this->category->text = $this->category->description;
$dispatcher->trigger('onContentPrepare', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$this->category->description = $this->category->text;

$results = $dispatcher->trigger('onContentAfterTitle', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayTitle = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentBeforeDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$beforeDisplayContent = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentAfterDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayContent = trim(implode("\n", $results));

// Include Extra-Fields to Events blog item
JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');

$current_date = JFactory::getDate('now');
$current_date_full = JHtml::_('date', $current_date, 'Y-m-d');
$blog_events_archive_label = 'archive';

?>
<div class="blog-events blog blog--<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Blog">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
		</div>
	<?php endif; ?>

	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
		<h2> <?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php if ($this->params->get('show_category_title')) : ?>
				<span class="subheading-category"><?php echo $this->category->title; ?></span>
			<?php endif; ?>
		</h2>
	<?php endif; ?>
	<?php echo $afterDisplayTitle; ?>

	<?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
		<?php $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
	<?php endif; ?>

	<?php if ($beforeDisplayContent || $afterDisplayContent || $this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category-desc clearfix">
			<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
				<img src="<?php echo $this->category->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($this->category->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>"/>
			<?php endif; ?>
			<?php echo $beforeDisplayContent; ?>
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
			<?php endif; ?>
			<?php echo $afterDisplayContent; ?>
		</div>
	<?php endif; ?>

	<?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
		<?php if ($this->params->get('show_no_articles', 1)) : ?>
			<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
		<div class="items-leading clearfix">
			<?php foreach ($this->lead_items as &$item) : ?>
				<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
					<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
					?>
				</div>
				<?php $leadingcount++; ?>
			<?php endforeach; ?>
		</div><!-- end items-leading -->
	<?php endif; ?>

	<?php
	$introcount = count($this->intro_items);
	$counter = 0;
	?>
	
	<?php if (!empty($this->intro_items)) : ?>
		<?php foreach ($this->intro_items as $key => &$item) : ?>
			<?php $rowcount = ((int) $key % (int) $this->columns) + 1; ?>
			<?php if ($rowcount === 1) : ?>
				<?php $row = $counter / $this->columns; ?>
				<div class="items-row cols-<?php echo (int) $this->columns; ?> <?php echo 'row-' . $row; ?> row-fluid clearfix">
			<?php endif; ?>

			<?php 
			$events_fields_array = FieldsHelper::getFields('com_content.article',  $item, True);
			$events_blog_fields = [];
			$blog_events_label = '';
			$blog_events_label_class = '';
			$events_label = '';
			$events_date_from_day = '';
			$events_date_from_month = '';
			$events_date_to_day = '';
			$events_date_to_month = '';
			$events_date_last_day = '';
			$events_date_last_month = '';

			foreach($events_fields_array as $events_fields_item)
			{
				$events_blog_fields_value[$events_fields_item->name] = $events_fields_item->value;
				$events_blog_fields_label[$events_fields_item->name] = $events_fields_item->label;
			}

			if (isset($events_blog_fields_value['event-label']) && $events_blog_fields_value['event-label'] !== '') {
				$blog_events_label = $events_blog_fields_value['event-label'];
				$blog_events_label_class = 'blog-events__item--' . $blog_events_label;
				
			}

			$events_date_from_full = JHtml::_('date', $events_blog_fields_value['event-date-from'], 'Y-m-d');

			if (isset($current_date_full) && isset($events_date_from_full) && $events_date_from_full < $current_date_full) {
				$blog_events_label = $blog_events_archive_label;
				$blog_events_label_class = 'blog-events__item--' . $blog_events_label;
			}
			?>

			<div class="span<?php echo round(12 / $this->columns); ?>">
				<div class="blog-events__item <?php echo $blog_events_label_class;?> item column-<?php echo $rowcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">

					<?php if (isset($blog_events_label) && $blog_events_label !== '' && $blog_events_label != $blog_events_archive_label) : ?>
						<div class="blog-events__label blog-events__label--<?php echo $blog_events_label; ?>">
							<?php echo $blog_events_label; ?>
						</div>
					<?php endif; ?>

					<?php if (isset($events_blog_fields_value['event-date-from']) && $events_blog_fields_value['event-date-from'] !== '') : ?>

						<?php
							$events_date_from_day = JHtml::_('date', $events_blog_fields_value['event-date-from'], 'j');
							$events_date_from_month = JHtml::_('date', $events_blog_fields_value['event-date-from'], 'F');
						?>

						<?php if (isset($events_blog_fields_value['event-date-to']) && $events_blog_fields_value['event-date-to'] !== '') : ?>
							<?php
								$events_date_to_day = JHtml::_('date', $events_blog_fields_value['event-date-to'], 'j');
								$events_date_to_month = JHtml::_('date', $events_blog_fields_value['event-date-to'], 'F');
							?>
						<?php endif; ?>

						<?php if (isset($events_blog_fields_value['event-date-last']) && $events_blog_fields_value['event-date-last'] !== '') : ?>
							<?php
								$events_date_last_day = JHtml::_('date', $events_blog_fields_value['event-date-last'], 'j');
								$events_date_last_month = JHtml::_('date', $events_blog_fields_value['event-date-last'], 'F');
							?>
						<?php endif; ?>

						<div class="blog-events__date">
							<?php echo $events_date_from_day .'&nbsp;'.$events_date_from_month; ?>
							<?php echo  $events_date_to_day ? ' – '. $events_date_to_day .'&nbsp;'.$events_date_to_month : ''; ?>
						</div>

						<?php if ($events_date_last_day && $events_date_last_month) : ?>
							<div class="blog-events__date-last">
								<div>
									<i class="far fa-flag"></i> 
									<?php echo $events_blog_fields_label['event-date-last']; ?> 
									<b><?php echo $events_date_last_day .' '.$events_date_last_month; ?></b>
								</div>
							</div>
						<?php endif; ?>

					<?php endif; ?>

					<?php if (isset($events_blog_fields_value['event-time']) && $events_blog_fields_value['event-time'] !== '') : ?>
						<div class="blog-events__time">
							<?php //echo $events_blog_fields_label['event-time']; ?>
							<div>
								<i class="far fa-clock"></i> початок о <?php echo $events_blog_fields_value['event-time']; ?>
							</div>
						</div>
					<?php endif; ?>

					<?php

					$this->item = &$item;

					echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $item);
					// echo $this->loadTemplate('item');

					?>

					<?php if (isset($events_blog_fields_value['event-location']) && $events_blog_fields_value['event-location'] !== '')  :?>
						<div class="blog-events__location">
							<div class="blog-events__text-label"><?php echo $events_blog_fields_label['event-location']; ?>:</div>
							<div>
								<i class="fas fa-map-marker-alt"></i> <?php echo $events_blog_fields_value['event-location']; ?>
							</div>
						</div>
					<?php endif; ?>

				</div>
				<!-- end item -->
				<?php $counter++; ?>
			</div><!-- end span -->
			<?php if (($rowcount == $this->columns) or ($counter == $introcount)) : ?>
				</div><!-- end row -->
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (!empty($this->link_items)) : ?>
		<div class="items-more">
			<?php echo $this->loadTemplate('links'); ?>
		</div>
	<?php endif; ?>

	<?php if ($this->maxLevel != 0 && !empty($this->children[$this->category->id])) : ?>
		<div class="cat-children">
			<?php if ($this->params->get('show_category_heading_title_text', 1) == 1) : ?>
				<h3> <?php echo JText::_('JGLOBAL_SUBCATEGORIES'); ?> </h3>
			<?php endif; ?>
			<?php echo $this->loadTemplate('children'); ?> </div>
	<?php endif; ?>
	<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="pagination">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?> </div>
	<?php endif; ?>
</div>
