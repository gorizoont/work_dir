<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>

<?php if ($this->countModules('footer-1 or footer-2 or footer-3 or footer-4')) : ?>
    <!-- begin footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row-fluid">
                <?php if ($this->countModules('footer-1 and footer-2 and footer-3 and footer-4')) : ?>
                    <div class="span3">
                        <jdoc:include type="modules" name="footer-1" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="footer-2" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="footer-3" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="footer-4" style="default"/>
                    </div>
                <?php elseif ($this->countModules('footer-1 and footer-2 and footer-3')) : ?>
                    <div class="span4">
                        <jdoc:include type="modules" name="footer-1" style="default"/>
                    </div>
                    <div class="span4">
                        <jdoc:include type="modules" name="footer-2" style="default"/>
                    </div>
                    <div class="span4">
                        <jdoc:include type="modules" name="footer-3" style="default"/>
                    </div>
                <?php elseif ($this->countModules('footer-1 and footer-2')) : ?>
                    <div class="span6">
                        <jdoc:include type="modules" name="footer-1" style="default"/>
                    </div>
                    <div class="span6">
                        <jdoc:include type="modules" name="footer-2" style="default"/>
                    </div>
                <?php elseif ($this->countModules('footer-1') && !$this->countModules('footer-2 or footer-3 or footer-4')) : ?>
                    <div class="span12">
                        <jdoc:include type="modules" name="footer-1" style="default"/>
                    </div>
                <?php else : ?>
                    <div class="span3">
                        <jdoc:include type="modules" name="footer-1" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="footer-2" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="footer-3" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="footer-4" style="default"/>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>
    <!-- end footer -->
<?php endif; ?>
