<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>

<?php if ($this->countModules('navigation')) : ?>
    <nav class="navigation">
        <div class="navigation__button">
            <a class="navigation__button-navbar" href="#" data-toggle="collapse" data-target=".navigation__block">
                <?php echo JText::_('TPL_SUMDU_SUBMENU_TEXT'); ?> 
                <i class="fas fa-arrow-down"></i>
            </a>
        </div>
        <div class="nav-collapse collapse navigation__block">
            <jdoc:include type="modules" name="navigation" style="none"/>
        </div>
    </nav>
<?php endif; ?>