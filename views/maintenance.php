<?php
/**
 * Maintenance View
 * Users will encounter this page when the system is development mode
 **/
?>
<div class="container">
	<div class="panel panel-default" id="devmode-panel">

		<div class="panel-heading">
			<?php echo Yii::t('devmode.maintenance', '<strong>Development</strong> Mode'); ?>
		</div>
		<div class="panel-body">
			<h4><?php echo Yii::t('devmode.maintenance', 'We\'re working on some things...'); ?></p></h4>
			<hr />
			<p><?php echo (HSetting::Get('devDescription', 'devmode') != null) ? HSetting::Get('devDescription', 'devmode') :
							Yii::t('devmode.maintenance', 'We are currently under development right now. Please check back soon!'); ?></p>
		</div>
		
	</div>
</div>

<?php echo HSetting::GetText('trackingHtmlCode'); ?>


