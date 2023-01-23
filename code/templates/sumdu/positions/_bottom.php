<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>

<?php if ($this->countModules('bottom-1 or bottom-2 or bottom-3 or bottom-4')) : ?>
    <!-- begin bottom -->
    <section class="section section--bottom">
        <div class="container-fluid">
            <div class="row-fluid">
                <?php if ($this->countModules('bottom-1 and bottom-2 and bottom-3 and bottom-4')) : ?>
                    <div class="span3">
                        <jdoc:include type="modules" name="bottom-1" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="bottom-2" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="bottom-3" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="bottom-4" style="default"/>
                    </div>
                <?php elseif ($this->countModules('bottom-1 and bottom-2 and bottom-3')) : ?>
                    <div class="span4">
                        <jdoc:include type="modules" name="bottom-1" style="default"/>
                    </div>
                    <div class="span4">
                        <jdoc:include type="modules" name="bottom-2" style="default"/>
                    </div>
                    <div class="span4">
                        <jdoc:include type="modules" name="bottom-3" style="default"/>
                    </div>
                <?php elseif ($this->countModules('bottom-1 and bottom-2 and bottom-4')) : ?>
                    <div class="span9">
                        <div class="span6">
                            <jdoc:include type="modules" name="bottom-1" style="default"/>
                        </div>
                        <div class="span6">
                            <jdoc:include type="modules" name="bottom-2" style="default"/>
                        </div>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="bottom-4" style="default"/>
                    </div>
                <?php elseif ($this->countModules('bottom-1 and bottom-2')) : ?>
                    <div class="span6">
                        <jdoc:include type="modules" name="bottom-1" style="default"/>
                    </div>
                    <div class="span6">
                        <jdoc:include type="modules" name="bottom-2" style="default"/>
                    </div>
                <?php elseif ($this->countModules('bottom-1') && !$this->countModules('bottom-2 or bottom-3 or bottom-4')) : ?>
                    <div class="span12">
                        <jdoc:include type="modules" name="bottom-1" style="default"/>
                    </div>
                <?php else : ?>
                    <div class="span3">
                        <jdoc:include type="modules" name="bottom-1" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="bottom-2" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="bottom-3" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="bottom-4" style="default"/>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- end bottom -->
<?php endif; ?>
