<?php
/**
 * Defines the module events
 *
 * @package humhub.modules.devmode.events
 * @author Jordan Thompson
 */

class DevModeEvents {
	
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem(array(
            'label' => Yii::t('devmode.base', 'Development Mode'),
            'url' => Yii::app()->createUrl('//devmode/config/config'),
            'group' => 'settings',
            'icon' => '<i class="fa fa-lock"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'devmode' && Yii::app()->controller->id == 'admin'),
            'sortOrder' => 300,
        ));

    }	

}