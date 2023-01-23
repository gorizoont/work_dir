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
<!-- begin copyright -->
<section class="copyright">
    <div class="container-fluid">
        <div class="copyright__text">
            <?php if ($this->countModules('copyright')) : ?>
                <jdoc:include type="modules" name="copyright" style="none"/>
            <?php endif; ?>
            <p>
                © <?php echo date("Y"); ?> <?php echo JText::_('TPL_SUMDU_COPYRIGHT'); ?>
            </p>
            <p>Design & Develop by <a href="//web.sumdu.edu.ua" target="_blank" title="Center of Web-development">web.sumdu.edu.ua</a></p>
        </div>
    </div>
</section>
<!-- begin copyright -->
