<?php
/**
 * Created by PhpStorm.
 * User: FOX
 * Date: 18/01/2016
 * Time: 9:59 AM
 */
if (! defined('ABSPATH')) {
    exit();
}

if (! class_exists('MetaTaxonomyFramework')) :

    class MetaTaxonomyFramework{

        function __construct()
        {
            // admin scripts.
            add_action('admin_enqueue_scripts', array($this, 'load_scripts'));

            /* add fields attributes. */
            add_action('product_cat_add_form_fields', array($this, 'add_taxonomy_fields'));
            add_action('product_cat_edit_form_fields', array( $this, 'edit_taxonomy_fields' ), 10 );

            add_action('portfolio-categories_add_form_fields', array($this, 'add_taxonomy_fields'));
            add_action('portfolio-categories_edit_form_fields', array( $this, 'edit_taxonomy_fields' ), 10 );

            add_action('cooking-time_add_form_fields', array($this, 'add_cooking_time_fields'));
            add_action('cooking-time_edit_form_fields', array( $this, 'edit_cooking_time_fields' ), 10 );

            /* actions save and edit term. */
            add_action( 'created_term', array( $this, 'save_category_fields' ), 10, 3 );
            add_action( 'edit_term', array( $this, 'save_category_fields' ), 10, 3 );
        }

        /**
         * load scripts.
         */
        function load_scripts(){

            $screen = get_current_screen();

            /** tax */
            if($screen->base == 'edit-tags' || $screen->base == 'term'){
                wp_enqueue_media();
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script('wp-color-picker');
                wp_enqueue_style('taxonomy.custom-field', get_template_directory_uri() . '/inc/taxonomy-meta/css/taxonomy.custom-field.css');
                wp_enqueue_script('taxonomy.custom-field', get_template_directory_uri() . '/inc/taxonomy-meta/js/taxonomy.custom-field.js', array('jquery'), '1.0.0', true);
            }
        }

        /**
         * add attributes field.
         */
        function add_taxonomy_fields($term){

            $_thumb_id = $_term_hover_image = $_taxonomy_icon = $term_hover_color = ''; $_thumb_no = get_template_directory_uri() . '/assets/images/placeholder.png';

            if(isset($term->term_id)) {
                $_thumb_id = get_term_meta($term->term_id, 'taxonomy-thumbnail-id', true);
                $_attachment = wp_get_attachment_image_src($_thumb_id, 'thumbnail');
                $_thumb_url = isset($_attachment[0]) ? $_attachment[0] : $_thumb_no ;

                $_term_hover_image = get_term_meta($term->term_id, 'taxonomy-hover-image-id', true);
                $_hover_attachment = wp_get_attachment_image_src($_term_hover_image, 'thumbnail');
                $_hover_thumb_url = isset($_hover_attachment[0]) ? $_hover_attachment[0] : $_thumb_no ;

                $_taxonomy_icon = get_term_meta($term->term_id, 'taxonomy-icon', true);
                $term_hover_color = get_term_meta($term->term_id, 'taxonomy-hover-color', true);
            }

            ?>
            <div class="form-field term-icon">
                <label for="taxonomy-icon"><?php esc_html_e('Icon', 'wp-organic'); ?></label>
                <div style="line-height: 30px;">
                    <input id="taxonomy-icon" type="text" name="taxonomy-icon" value="<?php echo esc_attr($_taxonomy_icon); ?>" style="width: 110px">
                    <button type="button" class="select-icon button"><i class="<?php echo esc_attr($_taxonomy_icon); ?>"></i> <?php esc_html_e('Select Icon', 'wp-organic');?></button>
                </div>
                <p class="description"><?php esc_html_e('You can select icon or add custom class.', 'wp-organic'); ?></p>
            </div>
            <div class="form-field term-image">
                <label for="pcd_thumbnail"><?php esc_html_e('Icon Image', 'wp-organic'); ?></label>
                <div id="pcd_thumbnail" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url($_thumb_url); ?>" width="60px" height="60px"></div>
                <div>
                    <div style="line-height: 60px;">
                        <input type="hidden" id="taxonomy-thumbnail-id" name="taxonomy-thumbnail-id" value="<?php echo esc_attr($_thumb_id); ?>">
                        <button type="button" class="pcd_upload_image_button button"><?php esc_html_e('Upload/Add image', 'wp-organic');?></button>
                        <button type="button" class="pcd_remove_image_button button" style="display: none;"><?php esc_html_e('Remove image', 'wp-organic');?></button>
                    </div>
                </div>
                <p class="description"><?php esc_html_e('Select a icon font or icon image for product cat.', 'wp-organic'); ?></p>
            </div>
            <div class="form-field term-image">
                <label for="pcd_hover_img"><?php esc_html_e('Hover Icon Image', 'wp-organic'); ?></label>
                <div id="pcd_hover_img" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url($_hover_thumb_url); ?>" width="60px" height="60px"></div>
                <div>
                    <div style="line-height: 60px;">
                        <input type="hidden" id="taxonomy-hover-image-id" name="taxonomy-hover-image-id" value="<?php echo esc_attr($_term_hover_image); ?>">
                        <button type="button" class="pcd_upload_image_button button"><?php esc_html_e('Upload/Add image', 'wp-organic');?></button>
                        <button type="button" class="pcd_remove_image_button button" style="display: none;"><?php esc_html_e('Remove image', 'wp-organic');?></button>
                    </div>
                </div>
                <p class="description"><?php esc_html_e('Select a icon font or icon image for product cat.', 'wp-organic'); ?></p>
            </div>
            <div class="form-field term-color">
                <label for="taxonomy-icon"><?php esc_html_e('Hover Color', 'wp-organic'); ?></label>
                <input id="taxonomy-hover-color" type="text" name="taxonomy-hover-color" value="<?php echo esc_attr($term_hover_color); ?>">
                <p class="description"><?php esc_html_e('You can select hover color for product cat.', 'wp-organic'); ?></p>
            </div>
            <div id="cms_icons_list" style="display: none;">
                <div class="icons-content">
                    <?php $icons = wp_coursaty_font_awesome();?>
                    <ul>
                        <?php foreach ($icons as $icon): ?>
                            <li><i class="<?php echo esc_attr($icon); ?>"></i></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div><!-- icons. -->
            <?php
        }

        /**
         * Edit category field.
         *
         * @param mixed $term Term (category) being edited
         */
        function edit_taxonomy_fields($term){
            ?>
            <tr class="form-field form-required term-name-wrap">
                <th scope="row"><label><?php esc_html_e('Options', 'wp-organic'); ?></label></th>
                <td>
                    <?php $this->add_taxonomy_fields($term); ?>
                </td>
            </tr>
            <?php
        }


        function add_cooking_time_fields($term){
            $_cooking_time='10:00';
            if(isset($term->term_id)) {
                $_cooking_time = get_term_meta($term->term_id, 'cooking-time', true);
            }
           ?>
            <div class="form-field">
                <label for="cooking-time"><?php esc_html_e('Cooking Time', 'wp-organic'); ?></label>
                <div>
                    <input id="cooking-time" type="text" name="cooking-time" value="<?php echo esc_attr($_cooking_time); ?>"
                </div>
                <p class="description"><?php esc_html_e('00:00', 'wp-organic'); ?></p>
            </div>
            <?php
        }

        function edit_cooking_time_fields($term){
            ?>
            <tr class="form-field form-required term-name-wrap">
                <th scope="row"><label><?php esc_html_e('Options', 'wp-organic'); ?></label></th>
                <td>
                    <?php $this->add_cooking_time_fields($term); ?>
                </td>
            </tr>
            <?php
        }

        /**
         * save_category_fields function.
         *
         * @param mixed $term_id Term ID being saved
         */
        function save_category_fields($term_id, $tt_id = '', $taxonomy = ''){
            /* thumbnail-id */
            if (isset($_POST['taxonomy-thumbnail-id']))
                update_term_meta($term_id, 'taxonomy-thumbnail-id', $_POST['taxonomy-thumbnail-id']);

            if (isset($_POST['taxonomy-icon']))
                update_term_meta($term_id, 'taxonomy-icon', $_POST['taxonomy-icon']);

            if (isset($_POST['taxonomy-hover-color']))
                update_term_meta($term_id, 'taxonomy-hover-color', $_POST['taxonomy-hover-color']);

            if (isset($_POST['taxonomy-hover-image-id']))
                update_term_meta($term_id, 'taxonomy-hover-image-id', $_POST['taxonomy-hover-image-id']);

            if (isset($_POST['cooking-time']))
                update_term_meta($term_id, 'cooking-time', $_POST['cooking-time']);
        }
    }

endif;

new MetaTaxonomyFramework();