<?php

/**
 * Get an HTML table of differences between two strings.
 *
 * @param String $old - The old content.
 * @param String $new - The new content.
 * @return String - The HTML table of the differences between the strings.
 */
function diff($old, $new) {
	$old = explode("\n", $old);
	$new = explode("\n", $new);
	$diff = new Diff($old, $new);
	static $renderer;
	if ( ! $renderer) $renderer = new Diff_Renderer_Html_SideBySide;
	return $diff->Render($renderer);
}

/**
 * Print an array or object in a human readable format.
 * (Commented out due to debugbar usage.)
 */
/*function debug($thing) {
	echo '<pre>';
	print_r($thing);
	echo '</pre>';
}*/