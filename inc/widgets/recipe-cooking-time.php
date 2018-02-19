<?php

add_action('widgets_init', 'wp_uking_recipe_cooking_time');

function wp_uking_recipe_cooking_time() {
    register_widget('WP_Uking_Recipe_Cooking_Time');
}

class WP_Uking_Recipe_Cooking_Time extends WP_Widget {

    function __construct() {
        parent::__construct(
            'wp_uking_recipe_cooking_time', esc_html__('Recipe Filter Time','wp-organic'), array('description' => esc_html__('Uking widget.', 'wp-organic'))
        );
    }

    function widget($args, $instance) {

        $_min = !empty($_REQUEST['recipe-min-time']) ? $_REQUEST['recipe-min-time'] : '' ;
        $_max = !empty($_REQUEST['recipe-max-time']) ? $_REQUEST['recipe-max-time'] : '' ;

        wp_enqueue_style('jquery.datetimepicker', get_template_directory_uri() . '/assets/css/jquery.datetimepicker.css');
        wp_enqueue_script('jquery.datetimepicker', get_template_directory_uri() . '/assets/js/jquery.datetimepicker.full.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('rf-cooking-time', get_template_directory_uri() . '/assets/js/rf-cooking-time.js', array('jquery.datetimepicker'), '1.0.0', true);

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        echo '<div class="rf-cooking-time">';
        echo '<label for="recipe-min-time">'.esc_attr__( 'Min', 'wp-organic' ).'</label><input id="recipe-min-time" type="text" name="recipe-min-time" value="'.esc_attr($_min).'" placeholder="'.esc_attr__('00:00', 'wp-organic').'">';
        echo '<label for="recipe-max-time">'.esc_attr__( 'Max', 'wp-organic' ).'</label><input id="recipe-max-time" type="text" name="recipe-max-time" value="'.esc_attr($_max).'" placeholder="'.esc_attr__('00:00', 'wp-organic').'">';
        echo '</div>';

        echo $args['after_widget'];
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        return $instance;
    }

    function form($instance) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_attr__( 'Filter', 'wp-organic' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'wp-organic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }
}
?>