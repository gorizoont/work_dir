<?php 
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die; 

$document = &JFactory::getDocument();

// Set the MIME type for JSON output.
$document->setMimeEncoding('application/json');

$jinput = JFactory::getApplication()->input;
$api_token = $jinput->get('api_token', false);
$api_value = $this->params->get('sumdu_api_key', 'sumdu_api');

if ($api_token == false || $api_token != $api_value) {
	echo json_encode([
		"messege"=>'No data to render',
		"data"=> []
		]
	);
} 
else {

	try {
?>
<jdoc:include type="component" />
<?php 
	} 
	catch (Exception $e) {
		echo new JResponseJson($e);
	}

}
?>
