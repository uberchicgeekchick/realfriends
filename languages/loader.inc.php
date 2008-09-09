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

	if(!(
		(is_dir("{$rFds_realFriends['path']}/languages/{$rFds_realFriends['configuration']['language']}"))
			&&
		(is_readable("{$rFds_realFriends['path']}/languages/{$rFds_realFriends['configuration']['language']}.inc.php"))
	))
		$rFds_realFriends['configuration']['language']="english-US";
		
	$language_directory="{$rFds_realFriends['path']}/languages/{$rFds_realFriends['configuration']['language']}";

	//You'll need to edit these files if you may want or need to translate realFriends into your language.
	require_once("{$language_directory}/00-defaults-00.lang.php");

	require_once("{$language_directory}/contact.lang.php");
	require_once("{$language_directory}/copyright.lang.php");

	require_once("{$language_directory}/errors.lang.php");
	require_once("{$language_directory}/errors.mysql.lang.php");
	
	unset($language_directory);

?>
