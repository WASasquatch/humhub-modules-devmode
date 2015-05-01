<?php

// @Authors: WASasquatch, Luke-

class DevModeModule extends HWebModule
{

    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem(array(
            'label' => Yii::t('devmode.base', 'Development Mode'),
            'url' => Yii::app()->createUrl('//devmode/config/config'),
            'group' => 'settings',
            'icon' => '<i class="fa fa-lock"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == '' && Yii::app()->controller->id == 'admin'),
            'sortOrder' => 300,
        ));

    }
    
    public static function devBlock($event) {
            
        $devMode = HSetting::Get('devMode', 'devmode');
        $controller = $event->sender;

        if ($controller->id != 'auth') {

            if ($devMode && !Yii::app()->user->isAdmin()) {
                 $event->isValid = false;
                 $controller->render('application.modules.devmode.views.maintenance');
            }
            
        }
            
    }

    public static function onSidebarInit($event)
    {
        if (Yii::app()->moduleManager->isEnabled('devmode')) {
            
            $event->sender->addWidget('application.modules.devmode.widgets.DevModeSidebarWidget', array(), array(
                'sortOrder' => 0
            ));
        }
    }

    public function getConfigUrl()
    {
        return Yii::app()->createUrl('//devmode/config/config');
    }

    public function enable()
    {
        if (! $this->isEnabled()) {
            // set default config values
            if (!HSetting::Get('devMode', 'devmode')) {
                HSetting::Set('devMode', 'devmode', 0);
            }
            if (!HSetting::Get('devDescription', 'devmode')) {
                HSetting::Set('devDescription', 'devmode', 'Test');
            }
        }
        parent::enable();
    }
}
?>
