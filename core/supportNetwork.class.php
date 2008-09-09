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
	namespace realFriends::core;

	class supportNetwork {
		private $URI;
		
		public $id;
		public $title;
		public $about;
		
		function __construct() {
			
			$this->URI = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			
			$this->clearValues();
			
			$this->setupSupportNetwork(); 
			
		}//end '__construct' method.
		
		private function clearValues() {
			
			$this->ID = 0;
			$this->title="";
			$this->about="";
			
		}//end 'clearValues' method.
		
		public function setupSupportNetwork() {
			
			if(!($supportRow = new realFriends::db::resultset(
				$GLOBALS['rFds_realFriends']['lang']['errors']['start up'],
				"
				SELECT 
					`d`.`fqdn/ip`, `n`.`id`, `n`.`title`, `n`.`about`
				FROM
					`allNetworks` `n`
					LEFT JOIN
						`allDomains` `d`
					ON
						`n`.`id` = `d`.`network`
				WHERE
						`d`.`fqdn/ip` = '" . rawurlencode($_SERVER['HTTP_HOST']) . "'
					OR
						`n`.`default` = 'yes'
				ORDER BY
					`n`.`id` ASC, `n`.`default` DESC
				LIMIT 1",
				true
			)))
				exit(-1);
			
			$this->URI="http://" . $supportRow->currentRow['fqdn/ip'] . $_SERVER['REQUEST_URI'];
			
			$this->id=$supportRow->currentRow['id'];
			$this->title=$supportRow->currentRow['title'];
			$this->about=$supportRow->currentRow['about'];
			
		}//end 'setupSupportNetwork' method
		
		function __destruct() {
			
		}//end '__destruct' method
		
	}

?>
