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

	class writer {
		
		private $mimetype;
		public $document;
		
		
		
		
		function __construct() {
			$this->createDocumentObject(
				( $this->setMimetype($_SERVER['REQUEST_URI']) )
			);
		}//end '__construct' method.
		
		
		
		
		public function decodeHtml(&$htmlString) {
			return html_entity_decode($htmlString, ENT_QUOTES);
		}//end 'decodeHtml' method.
		
		
		
		
		public function encodeHtml(&$htmlString) {
			return htmlentities($htmlString, ENT_QUOTES);
		}//end 'encodeHtml' method.
		
		
		
		
		public function stripHtml(&$htmlString) {
			return preg_replace("/<[^>]*>/", "", $htmlString);
		}//end 'stripHtml' method.
		
		
		
		
		private function setMimetype($uri) {
			if(!($uri)) {
				$this->mimetype="text/xhtml";
				return;
			}
			
			return $this->findDoctype();
		}//end 'setMimetype' methood.
		
		
		
		
		
		private function findDoctype() {
			switch($this->mimetype) {
				case "image/svg":
					return "SVG";
				
				case "application/rss+xml": case "application/xml":
					return "RSS";
				
				case "text/xhtml": default:
					return "XHTML";
			}
		}//end 'findDoctype' method.
		
		
		
		
		public function getMimetype() {
			return $this->mimetype;
		}//end 'getMimetype' method.
		
		
		
		
		private function createDocumentObject($doctype) {
			require_once("{$GLOBALS['rFds_realFriends']['path']}/doctypes/{$doctype}.class.php");
			$doctype = "realFriends::doctype::{$doctype}";
			$this->document = new $doctype();
		}//end 'createDocumentObject' method.
		
		
		
		
		function __destruct() {
			//$this->document->__destruct();
		}//end '__destruct' method.
		
	}//end 'realFriends_sitePainter' class

?>
