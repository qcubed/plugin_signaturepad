<?php
	require('../../../qcubed/qcubed.inc.php');

	use QCubed\Plugin\QSignaturePad;

	class SampleForm extends QForm {
		protected $txtSignaturePad1;
		protected $lblImageLink;
		protected $btnClear;
		protected $btnSave;

		protected function Form_Create() {
			$this->txtSignaturePad1 = new QSignaturePad($this);
			$this->txtSignaturePad1->Clear();
			$this->lblImageLink = new QLabel($this);
			$this->lblImageLink->Name = QApplication::Translate("Image data");
			$this->btnClear = new QButton($this);
			$this->btnClear->Text = QApplication::Translate("Clear");
			$this->btnClear->AddAction(new QClickEvent, new QAjaxAction("btnClear_Click"));
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate("Save");
			$this->btnSave->AddAction(new QClickEvent, new QAjaxAction("btnSave_Click"));
		}
		
		public function btnClear_Click($strFormId, $strControlId, $strParameter) {
			$this->txtSignaturePad1->Clear();
			$this->lblImageLink->Text = "";
		}
		
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->lblImageLink->Text = $this->txtSignaturePad1->Data;
		}
	}

	SampleForm::Run('SampleForm');
?>
