
<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>

<section class="content">
    <div class="container-fluid">
        <div class="row-fluid">
            <?php if ($this->countModules('left and right')) : ?>
                <aside class="content__left span3">
                    <jdoc:include type="modules" name="left" style="default"/>
                </aside>
                <main class="span6">
                    <jdoc:include type="modules" name="content-1" style="default"/>
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="content-2" style="default"/>
                </main>
                <aside class="content__right span3">
                    <jdoc:include type="modules" name="right" style="default"/>
                </aside>
            <?php elseif ($this->countModules('left')) : ?>
                <aside class="content__left span3">
                    <jdoc:include type="modules" name="left" style="default"/>
                </aside>
                <main class="span9">
                    <jdoc:include type="modules" name="content-1" style="default"/>
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="content-2" style="default"/>
                </main>
            <?php elseif ($this->countModules('right')) : ?>
                <main class="span9">
                    <jdoc:include type="modules" name="content-1" style="default"/>
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="content-2" style="default"/>
                </main>
                <aside class="content__right span3">
                    <jdoc:include type="modules" name="right" style="default"/>
                </aside>
            <?php else : ?>
                <div class="content__main content__main--center">
                    <main class="span12">
                        <jdoc:include type="modules" name="content-1" style="default"/>
                        <jdoc:include type="message" />
                        <jdoc:include type="component" />
                        <jdoc:include type="modules" name="content-2" style="default"/>
                    </main>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
