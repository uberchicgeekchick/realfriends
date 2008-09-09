<?php
	/*
		(c) 2007-Present Katy G. B. <uberChicGeekChick@openSUSE.en>
		Writen by a disabled uberChick.  i have Generalized Dystonia.
		
		--------------------------- current RPL disclaimer ------------------------------
		|	a opy of the RPL may be found with this project or online at		|
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

	$rFds_realFriends['core']= new realFriends::core();
	$rFds_realFriends['db'] = new realFriends::db::socket( $rFds_realFriends['configuration']['database'] );

	$rFds_realFriends['supportNetwork'] = new realFriends::core::supportNetwork();

	/*
	function __autoload($className) {
		if( (
			( ( $class = (preg_replace(
				"/^realfriends_([^D]+)Doctype$/",
				"$1",
				$className
			) ) ) )
				&&
			( is_file("{$rFds_realFriends['path']}/design/doctypes/{$class}.class.php") )
		) ) {
			require_once("{$rFds_realFriends['path']}/design/doctypes/{$class}.class.php");
		}
	}//end '__autoload' function.
	*/
?>
