<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>

<?php if ($this->countModules('contact-1 or contact-2 or contact-3 or contact-4')) : ?>
    <!-- begin contact -->
    <section class="contact">
        <div class="container-fluid">
            <div class="row-fluid">
                <?php if ($this->countModules('contact-1 and contact-2 and contact-3 and contact-4')) : ?>
                    <div class="span3">
                        <jdoc:include type="modules" name="contact-1" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="contact-2" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="contact-3" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="contact-4" style="default"/>
                    </div>
                <?php elseif ($this->countModules('contact-1 and contact-2 and contact-3')) : ?>
                    <div class="span4">
                        <jdoc:include type="modules" name="contact-1" style="default"/>
                    </div>
                    <div class="span4">
                        <jdoc:include type="modules" name="contact-2" style="default"/>
                    </div>
                    <div class="span4">
                        <jdoc:include type="modules" name="contact-3" style="default"/>
                    </div>
                <?php elseif ($this->countModules('contact-1 and contact-2')) : ?>
                    <div class="span6">
                        <jdoc:include type="modules" name="contact-1" style="default"/>
                    </div>
                    <div class="span6">
                        <jdoc:include type="modules" name="contact-2" style="default"/>
                    </div>
                <?php elseif ($this->countModules('contact-1') && !$this->countModules('contact-2 or contact-3 or contact-4')) : ?>
                    <div class="span12">
                        <jdoc:include type="modules" name="contact-1" style="default"/>
                    </div>
                <?php else : ?>
                    <div class="span3">
                        <jdoc:include type="modules" name="contact-1" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="contact-2" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="contact-3" style="default"/>
                    </div>
                    <div class="span3">
                        <jdoc:include type="modules" name="contact-4" style="default"/>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- end contact -->
<?php endif; ?>
