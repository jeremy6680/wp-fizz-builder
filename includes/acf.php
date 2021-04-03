<?php
// Great snippet from Thierry Pigot: https://gist.github.com/thierrypigot/a07448abe1332e3c9d7c711cd28b2cd6
//
if( !class_exists('acf') )
{
	$tp_acf_notice_msg = __( 'This website needs "Advanced Custom Fields Pro" to run. Please download and activate it', 'tp-notice-acf' );
	
	/*
	*	Admin notice
	*/
	add_action( 'admin_notices', 'tp_notice_missing_acf' );
	function tp_notice_missing_acf()
	{
		global $tp_acf_notice_msg;
		
		echo '<div class="notice notice-error notice-large"><div class="notice-title">'. $tp_acf_notice_msg .'</div></div>';
	}


	/*
	*	Frontend notice
	*/
	add_action( 'template_redirect', 'tp_notice_frontend_missing_acf', 0 );
	function tp_notice_frontend_missing_acf()
	{
		global $tp_acf_notice_msg;
		
		wp_die( $tp_acf_notice_msg );
	}
}
else
{
	/*
	*	Mask ACF in WordPress Admin Menu
	* /!\ Change 'MY_USER_LOGIN_ON_THIS_WEBSITE' to your login
	*/
	add_action( 'plugins_loaded', 'tp_mask_acf' );
	function tp_mask_acf()
	{
		$current_user = wp_get_current_user();
		
		if( 'MY_USER_LOGIN_ON_THIS_WEBSITE' != $current_user->user_login )
		{
			define( 'ACF_LITE' , true );
		}
	}
}