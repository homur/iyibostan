<?php
extract(shortcode_atts(array(
    'item1_title'=>'',
    'item1_icon1'=>'',
    'item1_iconimage'=>'',
    'item1_status'=>'',
	'item2_title'=>'',
    'item2_icon2'=>'',
    'item2_iconimage'=>'',
    'item2_status'=>'',
	'item3_title'=>'',
	'item3_icon3'=>'',
	'item3_iconimage'=>'',
	'item3_status'=>'',
	'item4_title'=>'',
	'item4_icon4'=>'',
	'item4_iconimage'=>'',
	'item4_status'=>'',
), $atts));
?>


<div class="cms-step  cms-step-layout2">
	<div class="cms-step-inner">
		<div class="cms-step-inner2">
			<div class="cms-step-item <?php if ($item1_status == 'item-completed'){ echo 'item-completed';}?>">
				<div class="step-item-content">
					<?php
					$image_url = '';
					if (!empty($atts['item1_iconimage'])) {
						$attachment_image = wp_get_attachment_image_src($atts['item1_iconimage'], 'full');
						$image_url = $attachment_image[0];
					}
					?>
					<div class="icon">
						<?php if($image_url):?>
							<div class="cms-step-image">
								<img src="<?php echo esc_attr($image_url);?>" alt=""/>
							</div>
						<?php else:?>
							<span class="cms-step-icon">
							<i class="<?php echo esc_attr($item1_icon1);?>"></i>
						</span>
						<?php endif;?>
					</div>
					<div class="title custom-font-13">
						<?php echo esc_html($item1_title);?>
					</div>
				</div>
				<div class="line-complete">
					<div class="line-complete-left"><div class="line-complete-left-inner"></div></div>
					<div class="line-complete-right"><div class="line-complete-left-inner"></div></div>
				</div>
			</div>
			<div class="cms-step-item <?php if ($item2_status == 'item-completed'){ echo 'item-completed';}?>">
				<div class="step-item-content">
					<?php
					$image_url2 = '';
					if (!empty($atts['item2_iconimage'])) {
						$attachment_image2 = wp_get_attachment_image_src($atts['item2_iconimage'], 'full');
						$image_url2 = $attachment_image2[0];
					}
					?>
					<div class="icon">
						<?php if($image_url2):?>
							<div class="cms-step-image">
								<img src="<?php echo esc_attr($image_url2);?>" alt=""/>
							</div>
						<?php else:?>
							<span class="cms-step-icon">
							<i class="<?php echo esc_attr($item2_icon2);?>"></i>
						</span>
						<?php endif;?>
					</div>
					<div class="title custom-font-13">
						<?php echo esc_html($item2_title);?>
					</div>
				</div>
				<div class="line-complete">
					<div class="line-complete-left"><div class="line-complete-left-inner"></div></div>
					<div class="line-complete-right"><div class="line-complete-left-inner"></div></div>
				</div>
			</div>
			<div class="cms-step-item <?php if ($item3_status == 'item-completed'){ echo 'item-completed';}?>">
				<div class="step-item-content">
					<?php
					$image_url3 = '';
					if (!empty($atts['item3_iconimage'])) {
						$attachment_image3 = wp_get_attachment_image_src($atts['item3_iconimage'], 'full');
						$image_url3 = $attachment_image3[0];
					}
					?>
					<div class="icon">
						<?php if($image_url3):?>
							<div class="cms-step-image">
								<img src="<?php echo esc_attr($image_url3);?>" alt=""/>
							</div>
						<?php else:?>
							<span class="cms-step-icon">
							<i class="<?php echo esc_attr($item3_icon3);?>"></i>
						</span>
						<?php endif;?>
					</div>
					<div class="title custom-font-13">
						<?php echo esc_html($item3_title);?>
					</div>
				</div>
				<div class="line-complete">
					<div class="line-complete-left"><div class="line-complete-left-inner"></div></div>
					<div class="line-complete-right"><div class="line-complete-left-inner"></div></div>
				</div>
			</div>
			<div class="cms-step-item <?php if ($item4_status == 'item-completed'){ echo 'item-completed';}?>">
				<div class="step-item-content">
					<?php
					$image_url4 = '';
					if (!empty($atts['item4_iconimage'])) {
						$attachment_image4 = wp_get_attachment_image_src($atts['item4_iconimage'], 'full');
						$image_url4 = $attachment_image4[0];
					}
					?>
					<div class="icon">
						<?php if($image_url4):?>
							<div class="cms-step-image">
								<img src="<?php echo esc_attr($image_url4);?>" alt=""/>
							</div>
						<?php else:?>
							<span class="cms-step-icon">
							<i class="<?php echo esc_attr($item4_icon4);?>"></i>
						</span>
						<?php endif;?>
					</div>
					<div class="title custom-font-13">
						<?php echo esc_html($item4_title);?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
