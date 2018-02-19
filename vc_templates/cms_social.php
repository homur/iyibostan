<?php
extract(shortcode_atts(array(
    'icon1'=>'',
    'icon1_link'=>'',
    'icon2'=>'',
    'icon2_link'=>'',
    'icon3'=>'',
    'icon3_link'=>'',
    'icon4'=>'',
    'icon4_link'=>'',
    'icon5'=>'',
    'icon5_link'=>'',
    'icon6'=>'',
    'icon6_link'=>'',
    'icon7'=>'',
    'icon7_link'=>'',
    'icon8'=>'',
    'icon8_link'=>'',
    'icon9'=>'',
    'icon9_link'=>'',
    'icon10'=>'',
    'icon10_link'=>'',
    'icon11'=>'',
    'icon11_link'=>'',
    'icon12'=>'',
    'icon12_link'=>'',
    'icon13'=>'',
    'icon13_link'=>'',
    'social_style'=>'',
), $atts));
?>


<div class="cms-social-page <?php echo (isset($atts['social_style']) && $atts['social_style']) ? $atts['social_style'] : '' ?>">                
	<div class="cshero-social-list">
	    <?php if($icon1 !='') {?>
	        <a href="<?php echo esc_url($icon1_link)?>"><i class="<?php echo esc_attr($icon1); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon2 !='') {?>
	        <a href="<?php echo esc_url($icon2_link)?>"><i class="<?php echo esc_attr($icon2); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon3 !='') {?>
	        <a href="<?php echo esc_url($icon3_link)?>"><i class="<?php echo esc_attr($icon3); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon4 !='') {?>
	        <a href="<?php echo esc_url($icon4_link)?>"><i class="<?php echo esc_attr($icon4); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon5 !='') {?>
	        <a href="<?php echo esc_url($icon5_link)?>"><i class="<?php echo esc_attr($icon5); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon6 !='') {?>
	        <a href="<?php echo esc_url($icon6_link)?>"><i class="<?php echo esc_attr($icon6); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon7 !='') {?>
	        <a href="<?php echo esc_url($icon7_link)?>"><i class="<?php echo esc_attr($icon7); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon8 !='') {?>
	        <a href="<?php echo esc_url($icon8_link)?>"><i class="<?php echo esc_attr($icon8); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon9 !='') {?>
	        <a href="<?php echo esc_url($icon9_link)?>"><i class="<?php echo esc_attr($icon9); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon10 !='') {?>
	        <a href="<?php echo esc_url($icon10_link)?>"><i class="<?php echo esc_attr($icon10); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon11 !='') {?>
	        <a href="<?php echo esc_url($icon11_link)?>"><i class="<?php echo esc_attr($icon11); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon12 !='') {?>
	        <a href="<?php echo esc_url($icon12_link)?>"><i class="<?php echo esc_attr($icon12); ?>"></i></a>
	    <?php } ?>
	    <?php if($icon13 !='') {?>
	        <a href="<?php echo esc_url($icon13_link)?>"><i class="<?php echo esc_attr($icon13); ?>"></i></a>
	    <?php } ?>
	</div> 
</div>
