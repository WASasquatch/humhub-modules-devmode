<?php

	Yii::app()->moduleManager->register(array(
		'id' => 'devmode',
		'class' => 'application.modules.devmode.DevModeModule',
		'import' => array(
			'application.modules.devmode.*',
		),
		// Events to Catch 
		'events' => array(
			array('class' => 'AdminMenuWidget', 'event' => 'onInit', 'callback' => array('DevModeModule', 'onAdminMenuInit')),
            array('class' => 'Controller', 'event' => 'onBeforeAction', 'callback' => array('DevModeModule', 'devBlock')),
			array('class' => 'DashboardSidebarWidget', 'event' => 'onInit', 'callback' => array('DevModeModule', 'onSidebarInit')),
			),
	));
	

?>