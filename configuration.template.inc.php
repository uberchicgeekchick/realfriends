<?php
	/*
	 * (c) 2007-Present Kaity G. B. <uberChick -at- uberChicGeekChick.com>
	 * 	http://uberChicGeekChick.com/
	 *
	 * &hey!, I'm not the only uber chick trying to change &improve our world,
	 * express ourselves, create our own art form, &hack our lives!
	 * You say "WHAT...HUH...WTF?!?" - Yup we're here.  Learn about us, our projects, &our lives:
	 *	@http://uberChicks.net/
	 * &ATTN: Any girl out here, reading this, please join &meet your peers.
	 */

	/*
	 * I live with a debilitating progressive neuro-muscular disease named Generalized Dystonia.
	 * If you find my software useful please let me know.  &You can learn more about my life with GD:
	 * 	@http://Dystonia-DREAMS.org/
	 * 		-and-
	 * 	@http://www.dystonia-foundation.org/pages/more_info/61.php
	 */

	/*
	 * NOTE: Currently I'm releasing all of my software under the RPL, but I'm working
	 * on my own license focused on software writen by myself and other
	 * open source internet artists(i.e. internet programmers, developers, designers, &etc).
	 * This new liscense will focus on internet based apps.  I've far to often seen
	 * internet applications improved, modified, or even re-factored but because they're
	 * never officially `released` companies never have to release or share their code.
	 * Since I've began writing mostly internet focused apps for the last several years.
	 * Either browser based or other style apps.  I want to ensure that my intention of
	 * my software being kept in the spirit of `free as in freedom`.  As an open source
	 * developers creating internet based software.  And my software can re-coded or
	 * whatever and since it may never be `released`, code never has to be recontributed.
	 * Which is problem I want to resolve for all of my future apps.  I'd stick with RPL
	 * but it seriously restricts options when it comes to REST based &APIs for my software.
	 * If you can help contribute to this new internet based open source license
	 * please, please, pretty please contact me.
	 */

	/*
	 * Unless explicitly acquired and licensed from Licensor under another license,
    	 * the contents of this file are subject to the Reciprocal Public License
    	 * ("RPL")
    	 * Version 1.3, or subsequent versions as allowed by the RPL, and You
    	 * may not copy or use this file in either source code or executable
    	 * form, except in compliance with the terms and conditions of the RPL.
	 * 
	 * All software distributed under the RPL is provided strictly on an
	 * "AS IS" basis, WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, AND
    	 * LICENSOR HEREBY DISCLAIMS ALL SUCH WARRANTIES, INCLUDING
    	 * WITHOUT LIMITATION, ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR
    	 * A PARTICULAR PURPOSE, QUIET ENJOYMENT, OR NON-INFRINGEMENT. See the
    	 * RPL for specific language governing rights and limitations under
    	 * the RPL.
	 *
	 * ------------------------------------------------------------------------------
	 * |	a copy of the RPL may be found with this project or online at		|
	 * |	http://www.technicalpursuit.com/licenses/RPL_1.3.html			|
	 * --------------------------- current RPL disclaimer ---------------------------
	 */

	$rFds_realFriends['configuration']=array(
		'language'=>"english-US",
		'database'=>array(
			'server'=>"localhost:3306",
			'username'=>"realFriends",
			'password'=>"realFriends",
			'database'=>"realFriends"
		),
		
		'admin'=>array(
			'who are you?'=>"Admin",
			'email'=>"support@{$_SERVER["HTTP_HOST"]}",
			'sex'=>"organization" //supported options are: female, male, organization, not_applicable
		)
	);

?>
