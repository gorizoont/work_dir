<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>

<?php if ($this->countModules('user-1')) : ?>
    <!-- begin user-1 -->
    <section class="section section--user-1">
        <jdoc:include type="modules" name="user-1" style="container"/>
    </section>
    <!-- end user-1 -->
<?php endif; ?>
