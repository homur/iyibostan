<?php
extract(shortcode_atts(array(
    'portfolio_masonry_category' => '',      
), $atts));
?>
<div class="cms-portfolio-masonry-layout1">
	<?php 
		
	    wp_organic_portfolio_masonry($portfolio_masonry_category);
	?>
</div>
