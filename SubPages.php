<?php
/*
Plugin Name: Display Subpages Widget
Description: Show <?php the_subpages() ?>
Author: Lincoln Baxter
Version: 1.1
*/

/*
	Simply displays:
	<div class="subpages">
	<?php the_subpages() ?>
	</div>
*/


function widget_subpages_init() {

	if ( !function_exists('register_sidebar_widget') )
	{
		return;
	}

	function widget_subpages($args) 
	{
		extract($args);
		echo $before_widget.'<div class="subpages">';
		the_subpages();
		echo '</div>'.$after_widget;
	}

	function widget_subpages_control() {
		echo 'There are no settings for this widget.';
	}
	
	// This registers our widget so it appears with the other available
	// widgets and can be dragged and dropped into any active sidebars.
	register_sidebar_widget(array('Sub Page Menu', 'widgets'), 'widget_subpages');

	// This registers our optional widget control form. Because of this
	// our widget will have a button that reveals a 300x100 pixel form.
	register_widget_control(array('Sub Page Menu', 'widgets'), 'widget_subpages_control', 300, 190);
}

// Run our code later in case this loads prior to any required plugins.
add_action('widgets_init', 'widget_subpages_init');

?>
