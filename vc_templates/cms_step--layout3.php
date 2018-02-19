<?php
extract(shortcode_atts(array(
    'item1_title'=>'',
    'item1_status'=>'',
	'item2_title'=>'',
    'item2_status'=>'',
	'item3_title'=>'',
	'item3_status'=>'',
	'item4_title'=>'',
	'item4_status'=>'',
	'item5_title'=>'',
	'item5_status'=>'',
), $atts));
?>


<div class="cms-step  cms-step-layout3">
	<div class="cms-step-inner">
		<div class="cms-step-inner2">
			<div class="cms-step-item <?php if ($item1_status == 'item-completed'){ echo 'item-completed';}?>">
				<div class="icon">
					<?php esc_html_e('1','wp-organic');?>
				</div>
				<div class="title custom-font-8">
					<?php echo esc_html($item1_title);?>
				</div>
			</div>
			<div class="cms-step-item <?php if ($item2_status == 'item-completed'){ echo 'item-completed';}?>">
				<div class="icon">
					<?php esc_html_e('2','wp-organic');?>
				</div>
				<div class="title custom-font-8">
					<?php echo esc_html($item2_title);?>
				</div>
			</div>
			<div class="cms-step-item <?php if ($item3_status == 'item-completed'){ echo 'item-completed';}?>">
				<div class="icon">
					<?php esc_html_e('3','wp-organic');?>
				</div>
				<div class="title custom-font-8">
					<?php echo esc_html($item3_title);?>
				</div>
			</div>
			<div class="cms-step-item <?php if ($item4_status == 'item-completed'){ echo 'item-completed';}?>">
				<div class="icon">
					<?php esc_html_e('4','wp-organic');?>
				</div>
				<div class="title custom-font-8">
					<?php echo esc_html($item4_title);?>
				</div>
			</div>
			<div class="cms-step-item <?php if ($item5_status == 'item-completed'){ echo 'item-completed';}?>">
				<div class="icon">
					<?php esc_html_e('5','wp-organic');?>
				</div>
				<div class="title custom-font-8">
					<?php echo esc_html($item5_title);?>
				</div>
			</div>
		</div>
	</div>
</div>
