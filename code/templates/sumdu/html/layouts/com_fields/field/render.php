<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_fields
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

if (!key_exists('field', $displayData))
{
	return;
}

$field = $displayData['field'];
$fieldName = $field->name;
$label = JText::_($field->label);
$value = $field->value;
$showLabel = $field->params->get('showlabel');
$labelClass = $field->params->get('label_render_class');

$currentLang = JFactory::getLanguage()->getTag();
$labelTranslate = [
	"en-GB" => [
		"event-date-from" => "Event start",
		"event-date-to" => "Event finish",
		"event-date-last" => "Last date",
		"event-label" => "Event status"
	],
	"ru-RU" => [
		"event-date-from" => "Начало события",
		"event-date-to" => "Конец события",
		"event-date-last" => "Последняя дата",
		"event-label" => "Статус события"
	]
];

if ($value == '')
{
	return;
} elseif (isset($labelTranslate[$currentLang])) { 
	$label = isset($labelTranslate[$currentLang][$fieldName]) ? $labelTranslate[$currentLang][$fieldName] : $label;
}
?>
<?php if ($showLabel == 1) : ?>
	<span data-field-name="<?php echo $fieldName; ?>" class="field-label <?php echo $labelClass; ?>"><?php echo htmlentities($label, ENT_QUOTES | ENT_IGNORE, 'UTF-8'); ?>: </span>
<?php endif; ?>
<span class="field-value"><?php echo $value; ?></span>
