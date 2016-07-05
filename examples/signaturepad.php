<?php
	require('../../../framework/qcubed.inc.php');

	use QCubed\Plugin\QSignaturePad;

	class SampleForm extends QForm {
		protected $txtSignaturePad1;
		protected $lblImageLink;
		protected $btnClear;
		protected $btnSave;

		protected function Form_Create() {
			$this->txtSignaturePad1 = new QSignaturePad($this);
			$this->lblImageLink = new QLabel($this);
			$this->lblImageLink->Name = QApplication::Translate("Image data");
			$this->btnClear = new QButton($this);
			$this->btnClear->Name = QApplication::Translate("Clear");
			$this->btnClear->AddAction(new QClickEvent, new QAjaxAction("btnClear_Click"));
			$this->btnSave = new QButton($this);
			$this->btnSave->Name = QApplication::Translate("Save");
			$this->btnSave->AddAction(new QClickEvent, new QAjaxAction("btnSave_Click"));
		}		
	}

	SampleForm::Run('SampleForm');
?>