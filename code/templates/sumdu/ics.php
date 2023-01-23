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

require_once(__DIR__ . '/helpers/sumdu_ics_helper.php');

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=sumdu-event-'. time() .'.ics');

$jinput = JFactory::getApplication()->input;

$location = $jinput->get('location', 'СумДУ');
$summary = $jinput->get('summary', 'Сумський державний університет');
$date_start = $jinput->get('date_start', '2020-01-03 09:00');
$date_end = $jinput->get('date_end', '2020-12-25 18:00');
$description = $jinput->get('description', 'Сумський державний університет запрошуе усіх бажаючих на навчання!');
$url = $jinput->get('url', 'https://sumdu.edu.ua');

$ics = new ICS(array(
	'location' => $location,
	'summary' => $summary,
	'dtstart' => $date_start,
	'dtend' => $date_end,
	'description' => $description,
	'url' => $url
 ));
 
 echo $ics->to_string();
