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
JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');

$jinput = JFactory::getApplication()->input;
$api_token = $jinput->get('api_token', false);
$tmpl_json = $jinput->get('tmpl', false);
$api_value = "sumdu_api";

if ($tmpl_json == false || $tmpl_json != 'json') {
	echo 'No data to render';

}
elseif ($api_token == false || $api_token != $api_value) {
	echo new JResponseJson([], 'No data to render');

} 
else {

	$site_root = JURI::base();
	$site_url = rtrim($site_root, '/');
	$data_result = [];
	$introcount = count($this->intro_items);
	$counter = 0;

	if (!empty($this->intro_items)) {
		foreach ($this->intro_items as $key => &$item) {
			$fields = [];
			$item_fields_array = FieldsHelper::getFields('com_content.article',  $item, true);

			foreach ($item_fields_array as $item_fields_item) {
				$fields[] = [
					"access"=>$item_fields_item->access,
					"title"=>$item_fields_item->title,
					"description"=>$item_fields_item->description,
					"name"=>$item_fields_item->name,
					"label"=>$item_fields_item->label,
					"value"=>$item_fields_item->value,
                    "state"=>$item_fields_item->state,
					"default_value"=>$item_fields_item->default_value,
                  	"rawvalue"=>$item_fields_item->rawvalue,
				];
			}

			$link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
			
			$images = json_decode($item->images, true);
			$images["image_intro"] = $images["image_intro"] != "" ? $site_root . $images["image_intro"] : $images["image_intro"];
			$images["image_fulltext"] = $images["image_fulltext"] != "" ? $site_root . $images["image_fulltext"] : $images["image_fulltext"];

			$data_result[] = [
				"access" => $item->access,
				"alias" => $item->alias,
				"base_url"=> $site_root,
				"link"=> $site_url . $link,
				"title"=> $item->title,
				"introtext"=> $item->introtext,
				"category_title" => $item->category_title,
				"category_route" => $item->category_route,
				"category_alias" => $item->category_alias,
				"display_date"=> $item->displayDate,
				"created"=> $item->created,
				"modified"=> $item->modified,
				"publish_up"=> $item->created,
				"featured"=> $item->featured,
				"hits"=> $item->hits,
				// "tags"=> $item->tags,
				"images"=> $images,
				"fields"=> $fields,
			];

			$counter++;
		}
	}
	try {
		echo new JResponseJson($data_result, 'News Blog Result');
	} 
	catch (Exception $e) {
		echo new JResponseJson($e);
	}
	// echo json_encode($data_result);
}

?>
