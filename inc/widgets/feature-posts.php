<?php
add_action('widgets_init', 'cs_feature_post');

function cs_feature_post() {
    register_widget('CS_Feature_Post');
}

class CS_Feature_Post extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cs_feature_post', esc_html__('CMS Feature Post','wp-organic'), array('description' => esc_html__('Feature Posts Widget.', 'wp-organic'),)
        );
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Feature Posts', 'wp-organic' ) : $instance['title'], $instance, $this->id_base);
        $show_date = (int) $instance['show_date'];
        $show_decs = (int) $instance['show_decs'];
        $number = (int) $instance['number'];

        //echo balanceTags($before_widget);
        echo '<aside id="cms-feature-post">';
        if($title) {
            echo balanceTags($before_title.$title.$after_title);
        }

        $sticky = get_option('sticky_posts');
        $args = array(
            'posts_per_page' => $number,
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in'  => $sticky,
            'featured' => 'yes',
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => 1
        );

        $wp_query = new WP_Query($args);
        $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";

        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', 'class="'. $extra_class . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
        }
        ?>
        <?php if ($wp_query->have_posts()){ ?>
            <div class="cms-feature-post">
                <ul class="cms-feature-post-wrapper wg-menu-item">
                    <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                        <li>
                            <div class="cms-feature-post-inner">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="cms-recent-media">
                                        <div class="image">
                                            <a class="post-featured-img" href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('wp_organic_blog_listing2'); ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="cms-recent-details <?php if(has_post_thumbnail() == '') {echo 'no-image';} ?>">
                                    <div class="cms-recent-details-inner">
                                        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="date">
                                            <span><?php echo get_the_date('F d, Y'); ?></span>

                                        </div>
                                        <a class="readmore" href="<?php the_permalink(); ?>"><?php echo esc_html__('read more', 'wp-organic' ); ?></a>

                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php } else { ?>
            <span class="notfound">No post found!</span>
            <?php
        }
        echo '</aside>';
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];
        $instance['show_date'] = $new_instance['show_date'];
        $instance['show_decs'] = $new_instance['show_decs'];
        $instance['number'] = (int) $new_instance['number'];
        $instance['extra_class'] = $new_instance['extra_class'];

        return $instance;
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $show_date = isset($instance['show_date']) ? esc_attr($instance['show_date']) : '';
        $show_decs = isset($instance['show_decs']) ? esc_attr($instance['show_decs']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
            $number = 5;
        ?>
        <p>
            <label for="<?php echo ''.$this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'wp-organic' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('extra_class'); ?>">Extra Class:</label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id('extra_class'); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php if(isset($instance['extra_class'])){echo esc_attr($instance['extra_class']);} ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('number'); ?>"><?php esc_html_e( 'Number of post to show:', 'wp-organic' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>
        <?php
    }
}
?>