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
	namespace realFriends::doctype;

	require_once("{$GLOBALS['rFds_realFriends']['path']}/doctypes/00-core.class.php" );

	class XHTML extends realFriends::core::doctype {
		
		
		
		
		private $CSS;
		private $javascript;
		private $modules;
		
		
		
		
		public function __construct() {
			
			parent::__construct();
			
			print("<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN'"
				."\n	'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>"
				."\n"
			);
			
			if(!($this->getTheme()))
				$this->cannotLoadTheme();//omg!  fatal error.
			
		}//end '__construct' method.
		
		
		
		
		private function cannotLoadTheme() {
			print(
				"\n<html>"
				."\n	<head>"
				."\n		<title>{$GLOBALS['rFds_realFriends']['supportNetwork']->title}</title>"
				."\n		<meta name='description' value='{$GLOBALS['rFds_realFriends']['supportNetwork']->title} {$GLOBALS['rFds_realFriends']['lang']['errors']['oops']} {$GLOBALS['rFds_realFriends']['lang']['errors']['load theme']} {$GLOBALS['rFds_realFriends']['lang']['errors']['fatal']}'>"
				."\n	</head>"
				."\n	<body>"
				."\n		<center style='color:#ff0000; font-weight:bolder;'>"
				."\n			{$GLOBALS['rFds_realFriends']['supportNetwork']->title} {$GLOBALS['rFds_realFriends']['lang']['errors']['oops']} {$GLOBALS['rFds_realFriends']['lang']['errors']['load theme']} {$GLOBALS['rFds_realFriends']['lang']['errors']['fatal']}!<br/>"
				."\n			{$GLOBALS['rFds_realFriends']['lang']['contact']}"
				."\n		</center>"
				."\n	</body>"
				."\n</html>"
				."\n"
			);
			
			exit(-1);
		}//end 'cannotLoadTheme' method.
		
		
		
		
		private function getTheme() {
			// add checking for friends' custom theme.
			if(!(
				($theme=new realFriends::db::resultset(
					$GLOBALS['rFds_realFriends']['lang']['errors']['load theme'],
					"
					SELECT
						`t`.`css`, `t`.`javascript`
					FROM
						`allNetworks` `n`
						LEFT JOIN
							`allThemes` `t`
						ON
							`n`.`theme`=`t`.`id`
					WHERE
						`n`.`id`='{$GLOBALS['rFds_realFriends']['supportNetwork']->id}'
							OR
						`t`.`default`='yes'
					ORDER BY
						`t`.`default` DESC"
				))
			))
				return false;
			
			if(($theme->currentRow['css']))
				$this->CSS=$theme->currentRow['css'];
			else
				$this->CSS=false;
			
			if(($theme->currentRow['javascript']))
				$this->javascript=$theme->currentRow['javascript'];
			else
				$this->javascript=false;
			
			return true;
		}//end 'getTheme' method.
		
		
		
		
		private function paintJavaScript() {
			if(!($this->javascript))
				return;
			
			print(
				"\n\t<script language='javascript' type='application/javascript'>"
					.(preg_replace("/^(.)/m", "\n\t\t$1", $this->javascript ))
				."\n\t</script>"
			);
			
		}//end 'paintJavaScript' method.
		
		
		
		
		private function paintCSS() {
			if(!($this->CSS))
				return;
			
			print(
				"\n\t<style type=\"text/css\">"
					.(preg_replace("/^(.)/m", "\n\t\t$1", $this->CSS))
				."\n\t</style>"
			);
			
		}//end 'paintCSS' method.
		
		
		
		
		private function paintHtmlHead() {
			print(
				"\n\t<head>"
				."\n\t\t<title>{$GLOBALS['rFds_realFriends']['supportNetwork']->title}</title>"
				."\n\t\t<meta name='description' value='".($GLOBALS['rFds_realFriends']['documentWriter']->stripHTML($GLOBALS['rFds_realFriends']['supportNetwork']->about))."'/>"
				."\n\t\t<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>"
			);
			
			$this->paintCSS();
			
			$this->paintJavaScript();
			
			print("\n\t</head>");
		}//end 'paintHtmlHead' method.
		
		
		
		
		public function startDocument(&$header) {
			
			print("<html>");
			
			$this->paintHtmlHead();
			
			print("\n\t<body>");
			
			/*	
				javascript should be included inside the pages body.
				this helps the dom load the page faster.
			*/
			parent::startDocument($header);
		} //end 'startDocument' method.
		
		
		
		
		public function paintDefaultContainer($name, $content) {
			$this->startElement("div", $name);
			$this->autoIndent($content);
			$this->closeLastElement();
		}//end 'paintDefaultContainer' method.
		
		
		
		
		public function startElement($element, $name=NULL, $input=false, $defaultValue=null, $style="", $label=null, $autoClose=false, $extra="") {
			/*
				if $input is true it needs to be the name of the input type.
					e.g., text, radio, check, &etc.
				and $name is required so there can be full control over css.
					values should prolly be set inside $extra.
				but to make this easier to use $defaultValue can be used instead.
			*/
				
			if($input)
				switch($input) {
					case 'textarea': case 'option':
						$autoClose=false;
					break;
					
					case 'password': case 'text': case 'hidden': case 'radio':
					case 'check': case 'select': case 'image':
						$autoClose=true;
					break;
					
					default:
						$input="text";
				}
			
			parent::startElement($element, $name, $input, $defaultValue, $style, $label, $autoClose, $extra);
			
		} //end 'startElement' method.
		
		
		
		
		public function __destruct() {
			print("{$this->tabs}</body>\n"
				."</html>\n");
		} //end '__destruct' method.
		
		
		
		
	}//end class

?>
