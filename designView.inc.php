<?php
	/*
		(c) 2007-Present Katy G. B. <uberChicGeekChick@openSUSE.en>
		Writen by a disabled uberChick.  i have Generalized Dystonia.
		
		--------------------------- current RPL disclaimer ------------------------------
		|	a copy of the RPL may be found with this project or online at		|
		|	http://www.technicalpursuit.com/licenses/RPL_1.3.html			|
		---------------------------------------------------------------------------------
		
		Unless explicitly acquired and licensed from Licensor under another license,
    		the contents of this file are subject to the Reciprocal Public License
    		("RPL")
    		Version 1.3, or subsequent versions as allowed by the RPL, and You
    		may not copy or use this file in either source code or executable
    		form, except in compliance with the terms and conditions of the RPL.
		
		All software distributed under the RPL is provided strictly on an "AS
    		IS" basis, WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, AND
    		LICENSOR HEREBY DISCLAIMS ALL SUCH WARRANTIES, INCLUDING
    		WITHOUT LIMITATION, ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR
    		A PARTICULAR PURPOSE, QUIET ENJOYMENT, OR NON-INFRINGEMENT. See the
    		RPL for specific language governing rights and limitations under
    		the RPL.
	*/

	require_once("{$rFds_realFriends['path']}/views/00-core.class.php");
	
	$rFds_realFriends['view'] = new realFriends::core::view();

	require_once("{$rFds_realFriends['path']}/views/{$rFds_realFriends['view']->whatsBeingViewed}.class.php");
	
	$views_class = "realFriends::view::{$rFds_realFriends['view']->whatsBeingViewed}";
	$rFds_realFriends['view'] = new $views_class();
	unset($views_class);
	
	if( (preg_match("/(\/save\/)/i", $_SERVER['REQUEST_URI'])) ) {
		$rFds_realFriends['view']->save();
		header(
			"Location:http://{$_SERVER['HTTP_HOST']}/"
			.(preg_replace( "/(\/save\/)/i", "", $rFds_realFriends->query_string ))
		);
		exit(0);
	}

?>
