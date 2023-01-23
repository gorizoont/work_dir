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
?>

<section id="wrapper" class="wrapper <?php echo ($fixed_size == 1) ? 'wrapper--fixed' : 'wrapper--fluid'; ?>">
    <?php 
    // Header
    require_once(__DIR__ . '/_header.php');
    // Navigation
    require_once(__DIR__ . '/_navigation.php');
    // Info top
    require_once(__DIR__ . '/_info_top.php');
    // Top
    require_once(__DIR__ . '/_top.php');
    // user top
    require_once(__DIR__ . '/_user_top.php');
    // Content - main part
    require_once(__DIR__ . '/_content.php');
    // user bottom
    require_once(__DIR__ . '/_user_bottom.php');
    // Bottom
    require_once(__DIR__ . '/_bottom.php');
    // Info bottom
    require_once(__DIR__ . '/_info_bottom.php');
    // Contact
    require_once(__DIR__ . '/_contact.php');
    // Footer
    require_once(__DIR__ . '/_footer.php');
    // Copyright
    require_once(__DIR__ . '/_copyright.php'); 
    ?>
</section>

<?php
// Modal
require_once(__DIR__ . '/_modal.php');
// Debug
require_once(__DIR__ . '/_debug.php');
?>
