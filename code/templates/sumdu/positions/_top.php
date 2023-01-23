<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>

<?php if ($this->countModules('top-1 or top-2 or top-3 or top-4')) : ?>
    <!-- begin top -->
    <section class="section section--top">
        <div class="container-fluid">
            <div class="row-fluid">
                <?php if ($this->countModules('top-1 and top-2 and top-3 and top-4')) : ?>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-1" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-2" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-3" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-4" style="default"/>
                    </div>
                <?php elseif ($this->countModules('top-1 and top-2 and top-3')) : ?>
                    <div class="span4">
                        <jdoc:include type="modules" name="top-1" style="default"/>
                    </div>
                    <div class="span4">
                        <jdoc:include type="modules" name="top-2" style="default"/>
                    </div>
                    <div class="span4">
                        <jdoc:include type="modules" name="top-3" style="default"/>
                    </div>
                <?php elseif ($this->countModules('top-1 and top-2 and top-4')) : ?>
                    <div class="span9">
                        <div class="span6">
                            <jdoc:include type="modules" name="top-1" style="default"/>
                        </div>
                        <div class="span6">
                            <jdoc:include type="modules" name="top-2" style="default"/>
                        </div>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-4" style="default"/>
                    </div>
                <?php elseif ($this->countModules('top-1 and top-2')) : ?>
                    <div class="span6">
                        <jdoc:include type="modules" name="top-1" style="default"/>
                    </div>
                    <div class="span6">
                        <jdoc:include type="modules" name="top-2" style="default"/>
                    </div>
                <?php elseif ($this->countModules('top-1 and top-4')) : ?>
                    <div class="span9">
                        <jdoc:include type="modules" name="top-1" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-4" style="default"/>
                    </div>
                <?php elseif ($this->countModules('top-1') && !$this->countModules('top-2 or top-3 or top-4')) : ?>
                    <div class="span12">
                        <jdoc:include type="modules" name="top-1" style="default"/>
                    </div>
                <?php else : ?>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-1" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-2" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-3" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="top-4" style="default"/>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- end top -->
<?php endif; ?>
