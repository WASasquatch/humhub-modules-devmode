<div class="panel panel-default" id="devmode-panel">

    <!-- Display panel menu widget -->
    <?php $this->widget('application.widgets.PanelMenuWidget', array('id' => 'devmode-panel')); ?>

	<div class="panel-heading">
        <?php echo Yii::t('DevModeModule.views_widget', '<strong>Development</strong> Mode'); ?>
    </div>
	<div class="panel-body">
        <p align="center"><?php echo Yii::t('DevModeModule.views_widget', 'You are currently in development mode!'); ?></p>
		<hr />
        <?php
            echo CHtml::link(Yii::t('DevModeModule.views_widget', 'Configuration'), $this->createUrl('//devmode/config/config'), array(
                'class' => 'btn btn-info'
            ));
		?>
    </div>
</div>

