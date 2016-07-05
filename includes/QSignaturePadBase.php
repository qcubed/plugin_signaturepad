<?php

	/**
	*
	* Wrapper for the QTickpickerBoxGen class. This is the glue between the jQuery widget
	* and QCubed. Formatting is based on the current jQuery UI theme.
	*/
	
	namespace QCubed\Plugin;

	//use \QType, \QDateTime, \QCallerException, \QInvalidCastException, \QModelConnectorParam;

	class QSignaturePadBase extends QSignaturePadGen {

		public function __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->registerFiles();
		}

		protected function registerFiles() {
			//$this->AddCssFile(__JQUERY_CSS__); // make sure they know 
			$this->AddPluginJavascriptFile("signaturepad", "signature_pad.js");
			//$this->AddPluginCssFile("signaturepad", "signature_pad.css");
		}

	}
	
	
?>