<?php

class DevModeSidebarWidget extends HWidget
{

    public function run()
    {        
        $devMode = HSetting::Get('devMode', 'devmode');
		if ($devMode == 1 ) {
			if (Yii::app()->user->isAdmin()) {
				$this->render('DevModePanel', array('devMode' => $devMode));
			} else {
				throw new CHttpException('418', Yii::t('devmode.base', Yii::app()->name . ' is currently under maintenance, check back later.'));
			}
		} 
    }

}
?>
