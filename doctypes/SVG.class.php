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

	class SVG extends realFriends::core::doctype {
		
		
		
		
		public function __construct() {
			print("<!DOCTYPE svg PUBLIC \"-//W3C//DTD SVG 1.1//EN\"\n"
				."	\"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\">");
		}//end '__construct' method.
		
		
		
		
		public function paintDefaultContainer($name, $content) {
			
			$this->startElement("path", $name);
			$this->autoIndent($content);
			$this->closeLastElement();
			
		}//end 'paintDefaultContainer' method.
		
		
		
		
		
		public function startElement($element, $name=NULL, $input=false, $defaultValue=null, $style="", $label=null, $autoClose=false, $extra="") {
			
			parent::startElement($element, $name, $input, $defaultValue, $style, $label, $autoClose, $extra);
			
		} //end 'startElement' method.
		
		
		
		
		public function startDocument(&$header) {
			//print("");
		} //end 'startDocument' method.
		
		
		
		
		public function paintDocument(&$body) {
			//print("");
		}//end 'paintDocument' method.
		
		
		
		
		public function endDocument(&$footer) {
			//print("");
		} //end 'endDocument' method.
		
		
		
		
		public function __destruct() {
			//print("");
		}//end '__destruct' method.
		
		
		
		
	}//end class

?>
