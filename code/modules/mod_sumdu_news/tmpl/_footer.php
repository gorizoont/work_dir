<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_sumdu_news
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<?php if($more_link): ?>
	<footer class="news__more">
		<a class="news__more-link" href="<?php echo htmlspecialchars($more_link); ?>" title="<?php echo $more_text; ?>" target="<?php echo $more_targe; ?>">
			<?php echo $more_text; ?><i class="fas fa-arrow-right"></i>
		</a>
</footer>
<?php endif; ?>

