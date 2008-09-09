<?php	// Project == realFriends
	/*
	 * (c) 2007-Present Kaity G. B. <Kaity -at- uberChicGeekChick.com>
	 * 	http://uberChicGeekChick.com/
	 * I live with a debilitating progressive neuro-muscular disease named Generalized Dystonia.
	 * If you find my software useful please let me know.  &You can learn more about my life with GD
	 * 	@http://Dystonia-DREAMS.org/
	 * 		-and-
	 * 	@http://www.dystonia-foundation.org/pages/early_onset_generalized_dystonia/60.php
	 */
	header( "Content-Type: text/html; charset=utf-8" );
	ini_set( "display_errors", TRUE );
	ini_set( "error_reporting", E_ALL | E_STRICT );
	ini_set( "date.timezone", "America/Denver" );

	/* DO NOT MODIFY THESE SETTINGS, it could really mess things up!
	   instead make your changes in 'configuration.inc.php'; this still has to load first!
	*/
	require_once("./core.inc.php");

	// You can make your personal changes here:
	require_once("{$rFds_realFriends['path']}/configuration.inc.php");

	//You'll need to edit these files if you may want or need to translate realFriends into your language.
	require_once("{$rFds_realFriends['path']}/languages/loader.inc.php");
	
	require_once("{$rFds_realFriends['path']}/requirements.inc.php");
	require_once("{$rFds_realFriends['path']}/designObjects.inc.php");
	
	require_once("{$rFds_realFriends['path']}/designView.inc.php");

	$rFds_realFriends['documentWriter'] = new realFriends::doctype::writer();

	$rFds_realFriends['documentWriter']->document->startDocument($rFds_realFriends['vars']['empty_string']);
	
	$rFds_realFriends['documentWriter']->document->paintDocument($rFds_realFriends['vars']['empty_string']);
	
	$rFds_realFriends['documentWriter']->document->endDocument($rFds_realFriends['vars']['empty_string']);

?>
