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

	abstract class doctype {
		
		private $tabs;
		private $tabCount;
		private $closingTags;
		
		
		
		
		public function __construct() {
			$this->tabs="\t";
			$this->tabCount=1;
			$this->closingTags="";
		}//end '__construct' method.
		
		
		
		
		public function __get($member) {
			switch($member) {
				case "tabCount":
					return $this->tabCount;
				
				case "tabs": default:
					return $this->tabs;
			}//switch($members)
		}//end '__get' method.
		
		
		
		
		public function __call($methodName, array $arguments) {
			return FALSE;
		}//end '__call' method.
		
		
		
		
		public function addTabs($howManyTabs=1) {
			$this->tabCount = $this->tabCount + $howManyTabs;
			
			$this->tabs="";
			for($i=0; $i<$this->tabCount; $i++)
				$this->tabs.="\t";
		}//end 'addTabs' method.
		
		
		
		
		public function addOpenElement($element) {
			if(!($element))
				return -1;
			
			$this->addTabs();
			
			$this->closingTags = "{$this->tabs}</{$element}>\n"
				.$this->closingTags;
			
		}//end 'addOpenElement' methods.
		
		
		
		
		public function startElement($element, $name=NULL, $input=false, $defaultValue=null, $style="", $label=null, $autoClose=false, $extra="") {
			/*
				$name is required and its value is used for these html attributes:
					`name`, `id`, &`class`
				$input: if this is a form element than $input needs to be the input type.
					i.e., text, radio, check, &etc.
				$style is for inline style values &will be placed in the style attribute.
			*/
			if(!($element))
				return -1;
			
			if($autoClose)
				$this->addOpenElement($element);
			
			print(
				"\n{$this->tabs}<"
				.( $input ?("input type='{$element}'"):($element) )
				.( $name ?(" name='{$name}' id='{$name}' class='{$name}'") :("") )
				.( $defaultValue ?(" value='{$defaultValue}'") :("") )
				.( $style ?(" style='{$style}'") :("") )
				.$extra
				.( $autoClose ?("/") :("") )
				.">"
				.( $label ?("<label for='{$name}'>{$label}</label>") :("") )
			);
			
			$this->addTabs();
			
		} //end 'startElement' method.
		
		
		
		
		public function autoFormat(&$content) {
			return "\n".(preg_replace("/^([\s]*)/m", "{$this->tabs}$1", $content));
		}//end 'autoIndent' method.
		
		
		
		
		public function autoIndent(&$content, $return=FALSE) {
			if(!($content))
				return;
			
			if(!($return))
				return print( $this->autoFormat($content) );
			
			return $this->autoFormat($content);
		}//end 'autoIndent' method.
		
		
		
		
		public function closeLastElement() {
			if(!($this->closingTags))
				return false;
			
			$tempClosingTags = preg_split("/^(\t+[^>]+>\n)/", $this->closingTags, 1, PREG_SPLIT_DELIM_CAPTURE);
			print($tempClosingTags[0]);
			
			$this->addTabs(-2);
			if(( isset($tempClosingTags[1]) && $tempClosingTags[1] )) {
				$this->closingTags=$tempClosingTags[1];
				return true;
			}
			
			$this->closingTags="";
			return false;
			
		}//end 'closeLastElement' method.
		
		
		
		
		public function closeElement($element) {
			print("\n{$this->tabs}</{$forced}>");
		}//end 'closeElement' method.
		
		
		
		
		private function closeAllOpenElements() {
			if(!($this->closingTags))
				return -1;
			
			$this->tabCount=2;
			$this->tabs="\t\t";
			print($this->closingTags);
		}// end 'closeOpenElements' method.
		
		
		
		
		abstract public function paintDefaultContainer($name, $content);
		/*NOTE: this must be handled by the doctype object... but here's an example:
		public function paintDefaultContainer($name, $content) {
			$this->startElement("div", $name);
			$this->autoIndent($content);
			$this->closeLastElement();
		}//end 'paintDefaultContainer' method.
		*/
		
		
		
		
		public function startDocument(&$header) {
			$this->paintDefaultContainer("pageHeader", $header);
			//$this->startElement("div", "pageContent");
		}//end 'startDocument' method.
		
		
		
		
		public function paintDocument(&$body) {
			$this->paintDefaultContainer("pageContent", $body);
		}//end 'paintDocument' method.
		
		
		
		
		public function endDocument(&$footer) {
			$this->closeAllOpenElements();
			$this->paintDefaultContainer("pageFooter", $footer);
			
			$this->paintDefaultContainer(
				"copyright",
				$GLOBALS['rFds_realFriends']['lang']['copyright']['contents']
				.$GLOBALS['rFds_realFriends']['lang']['copyright']['realFriends']
			);
			
		}//end 'endDocument' function.
		
		
		
		
		public function __destruct() {
			//print("");
		}//end '__destruct' method.
		
		
		
		
	}//end class

?>
