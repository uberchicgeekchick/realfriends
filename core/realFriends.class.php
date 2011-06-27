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
	namespace realFriends;
	
	class core {
		
		public $fromForms;
		public $query_string;
		
		function __construct() {
			
			if( ! (
				(isSet($_SERVER['QUERY_STRING']))
					&&
				(count($_GET))
			) ) {
				unset($_GET);
				$this->validate_query_string();
				$_GET = $this->fixSubmit( "GET" );
			}
			
			$this->fromForms = Array(
				'get' => &$_GET,
				'post' => &$_POST,
				'cookies' => &$_COOKIE
			);
			
		}//end '__construct' method.
		
		private function validate_query_string() {
			/* This sets $this->query_string from $_SERVER['REQUEST_URI'].
			 * after validating that only values requested from views, blocs, &etc are included.
			 */
			
			// TODO: Needs cleaned.
			$this->query_string = $_SERVER['REQUEST_URI'];
			
		}//end method: validate_query_string();
		
		private function fixSubmit( $whichOne = "GET" ) {
			
			$rawData = array();
			
			switch($whichOne) {
				case "GET":
					if( ! (
						(isset($_SERVER['QUERY_STRING']))
							&&
						($_SERVER['QUERY_STRING'])
					) )
						return array();
						
					$rawData = explode( "&", ( $_SERVER['QUERY_STRING'] . "&" ) );
				break;
				
				case "POST":
				break;
				
				case "COOKIE":
				break;
				
				default:
					return -1;
				break;
				
			}
			
			return $this->decode($rawData);
			
		}//end 'fixSubmit' method
		
		private function decode(&$rawData) {
			
			$newGlobalData = array();
			$stop = count( $rawData ) - 1;
			for( $i = 0; $i < $stop; $i++ ) {
				$tempData=explode("=", $rawData[$i]);
				$newGlobalData[ ( urldecode($tempData[0] ) ) ] = urldecode( (
																( (isset( $tempData[1] ))
																	?$tempData[1]
																	:""
																)
															) );
			}
			unset($rawData);
			
			return $newGlobalData;
			
		}//end 'decode' method
		
		function cleanUp() {
		}//end 'cleanUp' method.
		
		function __destruct() {
		}//end '__destruct' method
	}

?>
