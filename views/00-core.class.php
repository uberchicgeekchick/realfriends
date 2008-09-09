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

	class view {
		public $whatsBeingViewed;
		
		
		
		
		public function __construct() {
			$this->prepareCurrentView();
		}//end '__construct' method.
		
		
		
		
		final public function prepareCurrentView() {
			if( ($this->prepareRequestedView()) ) {
				$this->whatsBeingViewed = $GLOBALS['rFds_realFriends']->fromForms['get']['view'];
				return true;
			}
			
			if( ($this->prepareFriendsView()) ) {
				$this->whatsBeingViewed = $GLOBALS['rFds_realFriends']['friend']->defaultView;
				return true;
			}
			
			$this->prepareDefaultView();
		}//end 'prepareCurrentView' method.
		
		
		
		
		final private function prepareRequestedView() {
			if( ! (isset($GLOBALS['rFds_realFriends']->fromForms['get']['view'])) )
				return false;
			
			if( (
				(is_dir("{$GLOBALS['rFds_realFriends']['path']}/views/{$GLOBALS['realFriends']->fromForms['get']['view']}"))
					&&
				(is_readable("{$GLOBALS['rFds_realFriends']}/views/{$GLOBALS['realFriends']->fromForms['get']['view']}/00-main.class.php"))
			) ) {
				require_once("{$GLOBALS['rFds_realFriends']['path']}/views/{$GLOBALS['realFriends']->fromForms['get']['view']}/00-main.class.php");
				return true;
			}
			
			if( ! (
				(is_readable("{$GLOBALS['rFds_realFriends']['path']}/views/{$GLOBALS['realFriends']->fromForms['get']['view']}.class.php"))
			) )
				return false;
			
			require_once("{$GLOBALS['rFds_realFriends']['path']}/views/{$GLOBALS['realFriends']->fromForms['get']['view']}.class.php");
			return true;
			
		}//end 'prepareRequestedView' function.
		
		
		
		
		final private function prepareFriendsView() {
			
			if( !(
				(isset($GLOBALS['rFds_realFriends']['friend']))
					&&
				(is_object($GLOBALS['rFds_realFriends']['friend']))
			) )
				return false;
			
			if( (isset($GLOBALS['rFds_realFriends']['friend']->defaultView)) )
				if( (
					(is_dir("{$GLOBALS['rFds_realFriends']['path']}/views/{$GLOBALS['realFriends']['friend']->defaultView}"))
						&&
					(is_readable("{$GLOBALS['rFds_realFriends']['path']}/views/{$GLOBALS['realFriends']['friend']->defaultView}/00-main.class.php"))
				) )
					return require_once("{$GLOBALS['rFds_realFriends']['path']}/views/{$GLOBALS['realFriends']['friend']->defaultView}/00-main.class.php");
				
				else if( (
					(isset($GLOBALS['rFds_realFriends']['friend']['defaultView']))
						&&
					(is_file("{$GLOBALS['rFds_realFriends']['path']}/views/{$GLOBALS['realFriends']['friend']['defaultView']}.class.php"))
				) )
					return require_once("{$GLOBALS['rFds_realFriends']['path']}/views/{$GLOBALS['realFriends']['fromForms']['get']['view']}.class.php");
			
			return false;
		}//end 'prepareFriendsView' method.
		
		
		
		
		final private function prepareDefaultView() {
			$this->whatsBeingViewed = "homepage";
			require_once("{$GLOBALS['rFds_realFriends']['path']}/views/homepage.class.php");
		}//end 'prepareDefaultView' method.
		
		
		
		
		public function save() {
			
		}//end 'save' method.
		
		
		
		
		
		public function display() {
			
		}//end 'display' method.
		
		
		
		
		
		public function __destruct() {
			
		}//end '__destruct' method.
		
	}// end 'realFriends_coreView' class.

?>
