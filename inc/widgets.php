<?php
/*
@package timedoor
*/



/*
	Save Posts views
*/
function tmdr_save_post_views($postID)
{

	$metaKey = 'tmdr_post_views';
	$views = get_post_meta($postID, $metaKey, true);

	$count = (empty($views) ? 0 : $views);
	$count++;

	update_post_meta($postID, $metaKey, $count);

	//echo $views;
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


//Popular Posts Widget

class Tmdr_Popular_Posts_Widget extends WP_Widget
{

	//setup the widget name, description, etc...
	public function __construct()
	{

		$widget_ops = array(
			'classname' => 'timedoor-popular-posts-widget',
			'description' => 'Popular Posts Widget',
		);
		parent::__construct('timedoor_popular_posts', 'Timedoor Popular Posts', $widget_ops);
	}

	// back-end display of widget
	public function form($instance)
	{

		$title = (!empty($instance['title']) ? $instance['title'] : 'Popular Posts');
		$tot = (!empty($instance['tot']) ? absint($instance['tot']) : 4);

		$output = '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('title')) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr($this->get_field_id('title')) . '" name="' . esc_attr($this->get_field_name('title')) . '" value="' . esc_attr($title) . '"';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('tot')) . '">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr($this->get_field_id('tot')) . '" name="' . esc_attr($this->get_field_name('tot')) . '" value="' . esc_attr($tot) . '"';
		$output .= '</p>';

		echo $output;
	}

	//update widget
	public function update($new_instance, $old_instance)
	{

		$instance = array();
		$instance['title'] = (!empty($new_instance['title']) ? strip_tags($new_instance['title']) : '');
		$instance['tot'] = (!empty($new_instance['tot']) ? absint(strip_tags($new_instance['tot'])) : 0);

		return $instance;
	}

	//front-end display of widget
	public function widget($args, $instance)
	{

		$tot = absint($instance['tot']);

		$posts_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $tot,
			'meta_key'			=> 'tmdr_post_views',
			'orderby'			=> 'meta_value_num',
			'order'				=> 'DESC'
		);

		$posts_query = new WP_Query($posts_args);

		echo $args['before_widget'];

		if (!empty($instance['title'])) :

			echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];

		endif;

		if ($posts_query->have_posts()) :

			echo '<ul class="posts-list list-unstyled clearfix widget-tab">';

			while ($posts_query->have_posts()) : $posts_query->the_post();
				echo '<li class="widget-post-list">';
				echo '<div class="posts-thumb float-left">';
				echo '<a href="' . get_the_permalink() . '">';
				echo '<img src="' . get_the_post_thumbnail_url($post = null, $size = "post-thumb-small") . '" alt="' . get_the_title() . '">';
				echo '</a>';
				echo '</div>';
				echo '<div class="post-content">';
				echo '<h4 class="entry-title"><a href="' . get_the_title() . '">' . get_the_title() . '</a>';
				echo '</h4>';
				echo '<p class="post-meta">';
				echo '<span class="post-meta-date"><a href="' . get_the_permalink() . '"> <i class="fa fa-clock-o"></i> ' . get_the_date("j F") . '</a>';
				echo '</span>';
				echo '</p>';
				echo '</div>';
				echo '<div class="clearfix"></div>';
				echo '</li>';
			endwhile;
			echo '</ul>';
		endif;
		echo $args['after_widget'];
	}
}

add_action('widgets_init', function () {
	register_widget('Tmdr_Popular_Posts_Widget');
});

/*
	Latest Posts Widget
*/

class Tmdr_Latest_Posts_Widget extends WP_Widget
{

	//setup the widget name, description, etc...
	public function __construct()
	{

		$widget_ops = array(
			'classname' => 'tmdr-lastest-posts-widget',
			'description' => 'Lastest Posts Widget',
		);
		parent::__construct('tmdr_lastest_posts', 'Timedoor Lastest Posts', $widget_ops);
	}

	// back-end display of widget
	public function form($instance)
	{

		$title = (!empty($instance['title']) ? $instance['title'] : 'Lastest Posts');
		$tot = (!empty($instance['tot']) ? absint($instance['tot']) : 4);

		$output = '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('title')) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr($this->get_field_id('title')) . '" name="' . esc_attr($this->get_field_name('title')) . '" value="' . esc_attr($title) . '"';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr($this->get_field_id('tot')) . '">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr($this->get_field_id('tot')) . '" name="' . esc_attr($this->get_field_name('tot')) . '" value="' . esc_attr($tot) . '"';
		$output .= '</p>';

		echo $output;
	}

	// update widget
	public function update($new_instance, $old_instance)
	{

		$instance = array();
		$instance['title'] = (!empty($new_instance['title']) ? strip_tags($new_instance['title']) : '');
		$instance['tot'] = (!empty($new_instance['tot']) ? absint(strip_tags($new_instance['tot'])) : 0);

		return $instance;
	}

	// front-end display of widget
	public function widget($args, $instance)
	{

		$tot = absint($instance['tot']);

		$posts_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $tot,
			'post_status' 		=> 'publish',
    		'orderby' 			=> 'publish_date',
			'order'				=> 'DESC'
		);

		$posts_query = new WP_Query($posts_args);

		echo $args['before_widget'];

		if (!empty($instance['title'])) :

			echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];

		endif;

		if ($posts_query->have_posts()) :

			echo '<ul class="posts-list list-unstyled clearfix widget-tab">';

			while ($posts_query->have_posts()) : $posts_query->the_post();
				echo '<li class="widget-post-list">';
				echo '<div class="posts-thumb float-left">';
				echo '<a href="' . get_the_permalink() . '">';
				echo '<img src="' . get_the_post_thumbnail_url($post = null, $size = "post-thumb-small") . '" alt="' . get_the_title() . '">';
				echo '</a>';
				echo '</div>';
				echo '<div class="post-content">';
				echo '<h4 class="entry-title"><a href="' . get_the_title() . '">' . get_the_title() . '</a>';
				echo '</h4>';
				echo '<p class="post-meta">';
				echo '<span class="post-meta-date"><a href="' . get_the_permalink() . '"> <i class="fa fa-clock-o"></i> ' . get_the_date("j F") . '</a>';
				echo '</span>';
				echo '</p>';
				echo '</div>';
				echo '<div class="clearfix"></div>';
				echo '</li>';
			endwhile;
			echo '</ul>';

		endif;

		echo $args['after_widget'];
	}
}

add_action('widgets_init', function () {
	register_widget('Tmdr_Latest_Posts_Widget');
});
