<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.sumdu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>

<?php if ($show_sumdu_header) : ?>
    <div class="sumdu-header">
        <?php if ($show_logo_sumdu) : ?>
            <a id="allWeb__modalBtn" class="sumdu-header__web" href="//web.sumdu.edu.ua/uk/domains.html" target="_blank"><i class="fas fa-ellipsis-v"></i></a>
            <nav class="sumdu-header__nav">
                <a class="sumdu-header__logo" href="//sumdu.edu.ua" target="_blank" title="<?php echo JText::_('TPL_SUMDU_SITE_TITLE'); ?>">
                    <?php echo JText::_('TPL_SUMDU_FULL_TITLE'); ?>
                </a>
            </nav>
        <?php endif; ?>
        <?php if ($show_all_sumdu || $show_documents) : ?>
            <nav class="sumdu-header__nav sumdu-header__nav--right">
                <ul>
                    <?php if ($show_documents) : ?>
                    <li class="sumdu-header__nav-item">
                        <a id="allDocuments__modalBtn" href="//sumdu.edu.ua/uk/documents-sumdu.html" target="_blank">
                            <span class="sumdu-header__nav-text"><?php echo JText::_('TPL_SUMDU_ALL_DOCUMENTS'); ?></span>
                            <span class="sumdu-header__nav-icon"><i class="fas fa-briefcase"></i></span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if ($show_all_sumdu) : ?>
                        <li class="sumdu-header__nav-item">
                            <a id="allUniversity__modalBtn" href="//sumdu.edu.ua/uk/all-sumdu.html" target="_blank" title="<?php echo JText::_('TPL_SUMDU_ALL_DEPT_DESC'); ?>">
                                <span class="sumdu-header__nav-text"><?php echo JText::_('TPL_SUMDU_ALL_DEPT_TEXT'); ?></span>
                                <span class="sumdu-header__nav-icon"><i class="fas fa-th"></i></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
<?php endif; ?>

<header class="header <?php echo $sticky_header == 1 ? 'header--sticky' : ''; ?>">
    <div class="header__line"></div>
    <div class="header__logo">
        <?php if ($this->countModules('header-1')) : ?>
            <a class="header__logo-link" href="<?php echo $this->baseurl; ?>">
                <jdoc:include type="modules" name="header-1" style="none"/>
            </a>
        <?php elseif ($site_title) : ?>
            <a class="header__logo-link" style="<?php echo ($site_logo) ? 'background-image: url('. $site_logo .'); padding-left: 80px;' : ''; ?>" href="<?php echo $this->baseurl; ?>">
                <div class="header__logo-template  <?php echo ($site_logo) ? 'header__logo-template--image' : ''; ?>"><?php echo $site_title; ?></div>
            </a>
         <?php else: ?>
            <a class="header__logo-link header__logo-link--global" href="<?php echo $this->baseurl; ?>">
                <div class="header__logo-global"><?php echo $sitename; ?></div>
            </a>
        <?php endif; ?>
    </div>

    <div class="header__menu">
        <a class="collapsed" href="#" data-toggle="collapse" data-target=".nav-collapse"><span><?php echo JText::_('TPL_SUMDU_MENU_TEXT'); ?></span> <i class="fas fa-bars"></i></a>
    </div>

    <div class="header__menu-items nav-collapse collapse">
        <div class="header__extra-items">
            <?php if ($show_search) : ?>
                <div class="header__search">
                    <a href="<?php echo $this->baseurl; ?>/component/search"><span><?php echo JText::_('TPL_SUMDU_SEARCH_TEXT'); ?></span><i class="fas fa-search"></i></a>
                </div>
            <?php endif; ?>

            <?php if ($this->countModules('header-3')) : ?>
                <div class="header__lang">
                    <jdoc:include type="modules" name="header-3" style="default"/>
                </div>
            <?php endif; ?>
            <div class="header__extra-reset"></div>
        </div>
        <?php if ($this->countModules('header-2')) : ?>
            <div class="header__nav">
                <jdoc:include type="modules" name="header-2" style="default"/>
            </div>
        <?php endif; ?>
    </div>
    <div class="clear-block"></div>

</header>
