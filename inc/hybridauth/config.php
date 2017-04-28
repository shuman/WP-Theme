<?php
/**
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return
	array(
		"base_url" => admin_url("admin-ajax.php").'?action=hybridauth',

		"providers" => array (
			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "726081516214-0k0ga7d4566k90o5bb7vteg7rs5gujrb.apps.googleusercontent.com", "secret" => "6mnQ4nh_qTZ0_O7v4ehrVHb9" ),
			),

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "803525393059388", "secret" => "fcb0b4317ba3605ec8252fd6cf156ff9" ),
				"scope"   => "email", // optional
				// "display" => "popup",
			),

			"Twitter" => array (
				"enabled" => false, // Twitter
				"keys"    => array ( "key" => "#", "secret" => "#" )
			),

			"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "75mvpb0j5voh6l", "secret" => "WqtG1sGMUHWDhJFC" )
			),
		),

		// If you want to enable logging, set 'debug_mode' to true.
		// You can also set it to
		// - "error" To log only error messages. Useful in production
		// - "info" To log info and error messages (ignore debug messages)
		"debug_mode" => false,

		// Path to file writable by the web server. Required if 'debug_mode' is not false
		"debug_file" => dirname(__FILE__) ."/debug.txt",
	);
