<?php

class DevModeModule extends HWebModule
{

    private $assetsUrl;

    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem(array(
            'label' => Yii::t('devmode.base', 'Development Mode'),
            'url' => Yii::app()->createUrl('//devmode/devmode/config'),
            'group' => 'manage',
            'icon' => '<i class="fa fa-file-code-o"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == '' && Yii::app()->controller->id == 'admin'),
            'sortOrder' => 300,
        ));

    }

	
    public function getAssetsUrl()
    {
        if ($this->assetsUrl === null)
            $this->assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('devmode.assets'));
        return $this->assetsUrl;
    }

    public function init()
    {}

    /**
     * On build of the dashboard sidebar widget, add the devmode widget if module is enabled.
     *
     * @param type $event            
     */
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

    /**
     * Enables this module
     */
    public function enable()
    {
        if (! $this->isEnabled()) {
            // set default config values
            HSetting::Set('devMode', 0, 'devmode');
        }
        parent::enable();
    }
}
?>
