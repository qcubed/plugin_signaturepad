<?php require(__DOCROOT__ . __EXAMPLES__ . '/includes/header.inc.php'); ?>
	<?php $this->RenderBegin(); ?>

	<div class="instructions">
		<h1 class="instruction_title">QSignaturePad: enter a hand-written digital signature</h1>

		<b>QSignaturePad</b> is basen on the signature_pad.js file. It allows you to
		enter a hand-written digital signature. See
		<a href="https://github.com/szimek/signature_pad" target="_blank">SignaturePad Home Page</a>
		for a complete description and examples of usage.
		
	</div>

	<p><?php $this->txtSignaturePad1->Render(); ?></p>
	<p>
		<?php $this->btnClear->Render(); ?>
		<?php $this->btnSave->Render(); ?>
	</p>
	<p><?php $this->lblImageLink->RenderWithName(); ?></p>


<?php $this->RenderEnd(); ?>
<?php require(__DOCROOT__ . __EXAMPLES__ . '/includes/footer.inc.php'); ?>