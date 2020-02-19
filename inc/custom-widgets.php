<?php

// Widget: basic
// This is an example widget for reference. It is not registered as the line which would register it is commented-out below.

// Create new widget class
class gmuj_widget_basic extends WP_Widget {
	
	// Constructor
	function gmuj_widget_basic() {
		// Give widget name here
		parent::WP_Widget(false, $name = 'Mason Basic Widget');
	}

	// Widget form creation
	function form($instance) {
		// Check values
		if($instance) {
			$title = esc_attr($instance['title']);
			$textarea = $instance['textarea'];
		} else {
			$title = '';
			$textarea = '';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Description:', 'wp_widget_plugin'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>" rows="7" cols="20" ><?php echo $textarea; ?></textarea>
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['textarea'] = strip_tags($new_instance['textarea']);
		return $instance;
	}


	// display widget
	function widget($args, $instance) {

		extract($args);

		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$textarea = $instance['textarea'];
		echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box" style="">';
		echo '<div class="widget-title" style="">';

		// Check if title is set
		if ($title) {
			echo $before_title . $title . $after_title ;
		}
		echo '</div>';

		// Check if textarea is set
		echo '<div class="widget-textarea" style="width: 90%; margin-left:3%; padding:8px; background-color: white; border-radius: 3px; min-height: 70px;">';
		if ($textarea) {
			echo '<p class="wp_widget_plugin_textarea" style="font-size:15px;">'.$textarea.'</p>';
		}
		echo '</div>';
		echo '</div>';
		echo $after_widget;
	}

}

// register widget
//add_action('widgets_init', create_function('', 'return register_widget("gmuj_widget_basic");'));






// Widget: Mason Website Contacts

// Create new widget class
class gmuj_widget_website_contacts extends WP_Widget {
	
	// Constructor
	function gmuj_widget_website_contacts() {
		// Give widget name here
		parent::WP_Widget(false, $name = '(Mason) Website Contacts');
	}

	// Widget form creation
	function form($instance) {
		// Check values
		if($instance) {
			$title = esc_attr($instance['title']);
		} else {
			$title = '';
		}
		?>
		<p>This widget will output website contact info. It's contact info comes from the website contact fields in the theme customizer.</p>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	// display widget
	function widget($args, $instance) {

		extract($args);

		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		
		// Content before widget
		echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box">';

		// Insert title if it exists
		echo '<div class="widget-title">';
		if ($title) {
			echo $before_title . $title . $after_title ;
		}
		echo '</div>';

		// Insert main widget content
		echo '<p>';
		echo 'Content contact: ' . get_theme_mod('gmuj_website_contact_content');
		echo '<br />';
		echo 'Technical contact: ' . get_theme_mod('gmuj_website_contact_technical');
		echo '</p>';

		echo '</div>';

		// Content after widget
		echo $after_widget;

	}

}


// Widget: Mason Standard Contact Info Block

// Create new widget class
class gmuj_widget_mason_standard_contact_info extends WP_Widget {
	

	// Constructor
	function gmuj_widget_mason_standard_contact_info() {
		// Give widget name here
		parent::WP_Widget(false, $name = '(Mason) Standard Contact Info Block');
	}

	// Widget form creation
	function form($instance) {
		// Check values
		if($instance) {
			$title = esc_attr($instance['title']);
		} else {
			$title = '';
		}
		?>
		<p>This widget will output the standard Mason university contact info block.</p>
		<?php
	}

	// display widget
	function widget($args, $instance) {

		extract($args);

		// Content before widget
		echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box">';

		// Insert main widget content
		echo '<p style="margin-bottom:0; font-family: \'Roboto Slab\', serif; font-weight: normal; letter-spacing: 0.025em; color: #fc3; font-weight: bold; font-size: 28px; text-transform: uppercase;">Patriots Brave & Bold</p>';
		echo '<p style="color: white; font-family: \'Open Sans\', sans-serif; font-weight: bold; font-size: 14px; line-height: 21px;">4400 University Drive, Fairfax, Virginia 22030<br />&copy; 2020 George Mason University – Call: +1 (703) 993-1000</p>';

		echo '</div>';

		// Content after widget
		echo $after_widget;

	}

}

// Register widgets
function gmuj_register_widgets() {

	// Mason standard contact info block
	register_widget("gmuj_widget_mason_standard_contact_info");
	// Mason Website Contacts
	register_widget("gmuj_widget_website_contacts");
}

add_action('widgets_init', 'gmuj_register_widgets');
