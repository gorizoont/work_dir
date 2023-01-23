
<?php
defined('_JEXEC') or die;

function modChrome_no($module, &$params, &$attribs)
{
	if ($module->content) {
		echo $module->content;
	}
}

function modChrome_well($module, &$params, &$attribs)
{
	if ($module->content) {
		echo "<div class=\"well ". htmlspecialchars($params->get('moduleclass_sfx')) ."\">";
		echo "<div class=\"page-header\"><strong>".$module->title."</strong></div>";
		echo $module->content;
		echo "</div>";
	}
}

function modChrome_default($module, &$params, &$attribs)
{
	if ($module->content) {
		echo '<div class="module'. htmlspecialchars($params->get('moduleclass_sfx')) .'">';
            if ($module->showtitle) {
             	 echo "<div class=\"page-header\"><strong>".$module->title."</strong></div>";
            }
		echo $module->content;
		echo "</div>";
	}
}

function modChrome_container($module, &$params, &$attribs)
{
	if ($module->content) {
		echo '<div class="module'. htmlspecialchars($params->get('moduleclass_sfx')) .' module--container">';
			echo '<div class="container-fluid">';
				if ($module->showtitle) {
					echo "<div class=\"page-header\"><strong>".$module->title."</strong></div>";
				}
			echo $module->content;
			echo "</div>";
		echo "</div>";
	}
}

function modChrome_modal($module, &$params, &$attribs)
{
	if ($module->content) {
		echo '<div id="'. htmlspecialchars($params->get('header_class')) .'" class="modal hide fade module'. htmlspecialchars($params->get('moduleclass_sfx')) .'" tabindex="-1" role="dialog" aria-hidden="true">';

		echo '<div class="modal-header">';
			echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			if ($module->showtitle) {
					echo '<div class="page-header"><strong>'.$module->title.'</strong></div>';
			}
		echo '</div>';

		echo '<div class="modal-body">';
			echo $module->content;
		echo '</div>';

		echo ' <div class="modal-footer">';
			echo '<button class="btn" data-dismiss="modal" aria-hidden="true">Закрити</button>';
		echo '</div>';

		echo '</div>';
	}
}

?>
