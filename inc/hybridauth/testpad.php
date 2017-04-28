<?php
/**
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ------------------------------------------------------------------------
//	HybridAuth End Point
// ------------------------------------------------------------------------

// require_once( "Hybrid/Auth.php" );
// require_once( "Hybrid/Endpoint.php" );


// require_once( dirname(__FILE__) . "/Hybrid/Auth.php" );
 
 
if (isset($_REQUEST['hauth_start']) || isset($_REQUEST['hauth_done']))
{
	require_once( dirname(__FILE__) . "/Hybrid/Endpoint.php" );
    Hybrid_Endpoint::process();
}

if( isset( $_REQUEST["provider"] ) ){
	$provider_name = $_REQUEST["provider"];
 
	try
	{
		// inlcude HybridAuth library
		// change the following paths if necessary
		$config   = dirname(__FILE__) . '/config.php';
		require_once( dirname(__FILE__) . "/Hybrid/Auth.php" );
 
		// initialize Hybrid_Auth class with the config file
		$hybridauth = new Hybrid_Auth( $config );
 
		// try to authenticate with the selected provider
		$adapter = $hybridauth->authenticate( $provider_name );
 
		// then grab the user profile
		$user_profile = $adapter->getUserProfile();
		var_dump($user_profile);
	}
 
	// something went wrong?
	catch( Exception $e )
	{
		//header("Location: http://www.example.com/login-error.php");
		var_dump($e);
		die("Something wrong!");
	}

	
}