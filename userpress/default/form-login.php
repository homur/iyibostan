<?php
/**
 * The template for displaying login form.
 *
 * Override this template by copying it to yourtheme/userpress/layoutname/form-login.php
 *
 * @author 		UserPress
 * @package 	UserPress/Templates
 * @version     1.0.0
 */
global $user_press;
if (! defined ( 'ABSPATH' )) {
	exit (); // Exit if accessed directly
}
//$user_press['background']
$uniqid_id = uniqid('register-modal-');

?>
<div class="user-press-login">
	<div class="login-form" style="background:<?php echo esc_attr(get_option ( 'user_press_bg_color', '' )) ;?>" >
		<div class="login-content">
			<div class="login-group">
				<label class="label"><?php esc_html_e('Username', 'wp-organic');?></label>
				<input type="text" class="input user_name" placeholder="<?php esc_html_e('User name', 'wp-organic');?>" data-validate="<?php esc_html_e('Required Field', 'wp-organic'); ?>">
			</div>
			<div class="login-group password-group">
				<label class="label"><?php esc_html_e('Password', 'wp-organic');?></label>
				<input type="password" class="input password" data-type="password" placeholder="<?php esc_html_e('Password', 'wp-organic');?>" data-validate="<?php esc_html_e('Required Field', 'wp-organic'); ?>">

			</div>
			<div class="login-group login-remember">
				<input id="check" type="checkbox" class="check" checked>
				<label class="remember" for="check"><?php esc_html_e('Remember me ?', 'wp-organic');?></label>
				<a class="forget" href="<?php echo wp_lostpassword_url(get_permalink()); ?>"><?php esc_html_e('Forgot password', 'wp-organic') ?></a>
			</div>
			<div class="login-group">
				<button type="button" class="btn button-login progress-button" data-style="fill">
					<span class="content"><?php esc_html_e('Sign In', 'wp-organic');?></span>
					<span class="progress"><span class="progress-inner notransition" style="width: 50%; opacity: 1;"></span></span>
				</button>

			</div>
			<!-- Button trigger modal -->

		</div>
		
	</div>
</div>
