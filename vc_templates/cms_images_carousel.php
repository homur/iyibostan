<?php
extract(shortcode_atts(array(
    'image_item' => '',
), $atts));
?>
<div class="cms-carousel-images">
    <?php



            if (empty($image_item)) return;

            $ids = explode(',', $image_item);

            echo '<div class="images-item-wrap">';

            foreach ($ids as $id) {

                $image = wp_get_attachment_url($id);

                echo '<div class="gallery-item"><img class="img" src="' . esc_url($image) . '" alt=""/></div>';

            }

            echo '</div>';

    ?>
</div>