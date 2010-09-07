<?php

class Likeit_Widget extends WP_Widget {
	function Likeit_Widget() {
		
		$widget_options = array(
			'description' => 'A widget to show the most liked post (Like-it)'
		);
		
		parent::WP_Widget(false, $name = 'Most liked posts', $widget_options);
	}

	function form($instance) {
		
		$defaults = array( 'title' => __('Most liked posts'), 'displayed' => '10' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title') ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'displayed' ); ?>"><?php _e('Number of displayed posts') ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'displayed' ); ?>" name="<?php echo $this->get_field_name( 'displayed' ); ?>" value="<?php echo $instance['displayed']; ?>" class="widefat" />
		</p>
		
		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
	}

	function widget($args, $instance) {
		global $wpdb;
		
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;
			
		

		echo $after_widget;
		
	}
}
add_action('widgets_init', create_function('', 'return register_widget("Likeit_Widget");'));