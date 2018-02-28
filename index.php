<?php
/*
Plugin Name: Password Reset
Plugin URI: http://scree.it
Description: Customized password reset.
Version: 1.0.0
Author: landbryo
Author URI: http://scree.it
License: GPLv2 or later
Text Domain: password-reset
Domain Path: /languages/
*/

add_filter( 'retrieve_password_message', 'scree_password_message', 10, 4 );
function scree_password_message( $message, $key, $user_login, $user_data ){
    ob_start();

  $message = print('Someone has requested a password reset for the following account:' . "\r\n\r\n");
	$message .= print('Username: ' . $user_login . "\r\n\r\n");
	$message .= print('If this was a mistake, just ignore this email and nothing will happen.' . "\r\n\r\n");
	$message .= print('To reset your password, visit the following address:' . "\r\n\r\n");
	$message .= print(network_site_url() . "/wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ) . "\r\n");

  $message = ob_get_clean();
  return $message;
}
