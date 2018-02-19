<?php
/**
 * The template for displaying register form.
 *
 * Override this template by copying it to yourtheme/userpress/layoutname/form-register.php
 *
 * @author 		UserPress
 * @package 	UserPress/Templates
 * @version     1.0.0
 */
if (! defined('ABSPATH')) {
    exit(); // Exit if accessed directly
}
?>

<div class="user-press user-press-register" style="background:url(<?php echo esc_url(get_option( 'user_press_bg_img', '')); ?>) no-repeat center">
	<div class="register-form" style="background:<?php echo esc_attr(get_option( 'user_press_bg_color', '')) ;?>">
		<div class="fields-content">
			<div class="field-group">
				<label class="label"><?php esc_html_e('Username', 'wp-organic'); ?></label>
				<input id="res_user" type="text" class="input" placeholder="<?php esc_html_e('User name', 'wp-organic'); ?>" data-validate="<?php esc_html_e('Required Field', 'wp-organic'); ?>" data-user-length="<?php esc_html_e('Username too short. At least 4 characters is required.', 'wp-organic'); ?>" data-special-char="<?php esc_html_e("The value of text field can't contain any of the following characters: \ / : * ? \" < > space", 'wp-organic'); ?>">
			</div>
			<div class="field-group">
				<label class="label"><?php esc_html_e('Password', 'wp-organic'); ?></label>
				<input id="res_pass1" type="password" class="input" data-type="password" placeholder="<?php esc_html_e('Password', 'wp-organic'); ?>" data-validate="<?php esc_html_e('Required Field', 'wp-organic'); ?>" data-pass-length="<?php esc_html_e( 'Password length must be greater than 5.', 'wp-organic' ); ?>">
			</div>
			<div class="field-group">
				<label class="label"><?php esc_html_e('Repeat Password', 'wp-organic'); ?></label>
				<input id="res_pass2" type="password" class="input" data-type="password" placeholder="<?php esc_html_e('Confirm Password', 'wp-organic'); ?>" data-validate="<?php esc_html_e('Required Field', 'wp-organic'); ?>" data-pass-confirm="<?php esc_html_e('Your password and confirmation password do not match.', 'wp-organic'); ?>">
			</div>
			<div class="field-group">
				<label class="label"><?php esc_html_e('Email Address', 'wp-organic'); ?></label>
				<input id="res_email" type="text" class="input" placeholder="<?php esc_html_e('Email', 'wp-organic'); ?>" data-validate="<?php esc_html_e('Required Field', 'wp-organic'); ?>"  data-email-format="<?php esc_html_e('The Email address is incorrect!', 'wp-organic'); ?>">
			</div>
			<div class="field-group">
				<button type="button" class="button btn-up-register"><?php esc_html_e('CREATE ACCOUNT', 'wp-organic');?></button>
			</div>
		</div>
	</div>
</div>