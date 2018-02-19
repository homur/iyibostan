<?php

add_action('widgets_init', 'wp_uking_recipe_nationality');

function wp_uking_recipe_nationality() {
    register_widget('WP_Uking_Recipe_Nationality');
}

class WP_Uking_Recipe_Nationality extends WP_Widget {

    function __construct() {
        parent::__construct(
            'wp_uking_recipe_nationality', esc_html__('Recipe Filter','wp-organic'), array('description' => esc_html__('Uking widget.', 'wp-organic'))
        );
    }

    function widget($args, $instance) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        $_type = !empty($instance['type']) ? $instance['type'] : 'recipe-ingredients' ;

        $_find = !empty($_REQUEST[$_type]) ? $_REQUEST[$_type] : array();

        $_terms = get_terms($_type, array('orderby'=>'count', 'order' => 'DESC'));

        if($_terms):

            echo '<ul class="recipe-categories">';

            foreach ($_terms as $nationa):

                echo '<li class="cat-item">';
                echo '<input id="recipe-term-'.esc_attr($nationa->term_id).'" type="checkbox" name="'.esc_attr($_type).'[]" value="'.esc_attr($nationa->term_id).'"'.(in_array($nationa->term_id, $_find) ? ' checked="checked"' : '').'>';
                echo '<label for="recipe-term-'.esc_attr($nationa->term_id).'">'.esc_html($nationa->name).'</label>';
                echo '</li>';

            endforeach;

            echo '</ul>';
        endif;

        echo $args['after_widget'];
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['type'] = $new_instance['type'];
        return $instance;
    }

    function form($instance) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_attr__( 'Filter', 'wp-organic' );
        $type = ! empty( $instance['type'] ) ? $instance['type'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'wp-organic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php esc_html_e('Type:', 'wp-organic'); ?></label>
            <select id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>">
                <option value="recipe-ingredients"<?php if($type == 'recipe-ingredients'){ echo ' selected="selected"'; } ?>><?php esc_html_e('Ingredients', 'wp-organic'); ?></option>
                <option value="nationality"<?php if($type == 'nationality'){ echo ' selected="selected"'; } ?>><?php esc_html_e('Nationality', 'wp-organic'); ?></option>
            </select>
        </p>
        <?php
    }
}
?>