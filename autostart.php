<?php

Yii::app()->moduleManager->register(array(
    'id' => 'devmode',
    'class' => 'application.modules.devmode.DevModeModule',
    'import' => array(
        'application.modules.devmode.*',
    ),
    // Events to Catch 
    'events' => array(
        array('class' => 'DashboardSidebarWidget', 'event' => 'onInit', 'callback' => array('DevModeModule', 'onSidebarInit')),
        array('class' => 'AdminMenuWidget', 'event' => 'onInit', 'callback' => array('DevModeEvents', 'onAdminMenuInit')),
    ),
));
?>
