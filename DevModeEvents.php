	<?php
	/**
	 * Defines the module events
	 *
	 * @package humhub.modules.devmode.events
	 * @author Jordan Thompson
	 */

	class DevModeEvents extends CComponent {
		
		public function init() {
			User::model()->attachEventHandler('onAfterSave', array($this, 'devBlock'));
		}
		
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
		
		public static function devBlock($event) {
			
			$devMode = HSetting::Get('devMode', 'devmode');
			if ($devMode == 1 ) {
				if (!Yii::app()->user->isGuest) {
					if (!Yii::app()->user->isAdmin()) {
						throw new CHttpException('418', Yii::t('devmode.base', Yii::app()->name . ' is currently under maintenance, check back later.'));
					}
				} else {
					throw new CHttpException('418', Yii::t('devmode.base', Yii::app()->name . ' is currently under maintenance, check back later.'));
				}
			} 
			
		}
		
	}