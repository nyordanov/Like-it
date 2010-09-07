<?php

class Likeit_Widget extends WP_Widget {
	function Likeit_Widget() {
		
		$widget_options = array(
			'description' => 'A widget to show the most liked post (Like-it)'
		);
		
		parent::WP_Widget(false, $name = 'Most liked posts', $widget_options);
	}

	function form($instance) {
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
	}

	function widget($args, $instance) {
	}
}
add_action('widgets_init', create_function('', 'return register_widget("Likeit_Widget");'));