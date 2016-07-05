<?php
	/** 
	*
	* API for the signature_pad.js widget. Very basic implementation.
	*
	* @property string $Data The data:image/png;base64 image data
	*/
	namespace QCubed\Plugin;
	use \QType, \QApplication, \QInvalidCastException, \QCallerException;

	class QSignaturePadGen extends QBlockControl {
		/** @var string HTML tag to be used by the control (such as div or span) */
		protected $strTagName = 'canvas';
		
		protected function getJsObjectString() {
			$strControlId = $this->ControlId;
			$strId = "SignaturePad_" . $this->ControlId;
			$strCode = <<<JS
((function(){
	if ("undefined" === typeof window["$strId"]) {
		var canvas = document.getElementById("$strId");
		var signaturePad = new SignaturePad(canvas);
		window["$strId"] = signaturePad;
		signaturePad.onEnd = function() {
			qcubed.recordControlModification("$strControlId", "_Value", window["$strId"].toDataURL());
		}
	}
	return window["$strId"];
})())
JS;
		}
		
		protected function ExecuteFunction($strFunctionName /*, ... */) {
			$args = func_get_args();
			array_shift ($args);
			$strJsObjectCode = $this->getJsObjectString();
			$strArgsArray = array();
			if ($args) {
				foreach ($args as $a) {
					$strArgsArray[] = JavaScriptHelper::toJsObject();
				}
			}
			$strArgs = "";
			if ($strArgsArray) {
				$strArgs = ", " . implode(",", $strArgsArray);
			}
			$strCode = $strJsObjectCode . "." . $strFunctionName . "(" . $strArgs . ")";
			QApplication::ExecuteJavaScript($strCode);
		}
		
		public function GetEndScript() {
			$strJsObjectCode = $this->getJsObjectString();
			return $strJsObjectCode . "; " . parent::GetEndScript();
		}

		/**
		 * Remove the timepicker functionality completely. This will return the
		 * element back to its pre-init state.
		 */
		public function Clear() {
			$this->ExecuteFunction('clear');
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Data': return $this->strData;
				default: 
					try { 
						return parent::__get($strName); 
					} catch (QCallerException $objExc) { 
						$objExc->IncrementOffset(); 
						throw $objExc; 
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'Data':
					try {
						$this->strData = QType::Cast($mixValue, QType::String);
						$this->ExecuteFunction('fromDataURL', $this->strData);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case '_Value':
					try {
						$this->strData = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				default:
					try {
						parent::__set($strName, $mixValue);
						break;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Get an array of QModelConnectorParam types to use for displaying options in the ModelConnector dialog.
		 * @return \QModelConnectorParam[]
		 */
		public static function GetModelConnectorParams() {
			return array_merge(parent::GetModelConnectorParams(), array());
		}

	}

?>
