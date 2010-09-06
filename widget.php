<?php

register_widget('Likeit_Widget');
class Likeit_Widget extends WP_Widget {
	function Likeit_Widget() {
		parent::WP_Widget(false, $name = 'Likeit_Widget');
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

