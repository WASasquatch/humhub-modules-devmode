<?php

class DevModeSidebarWidget extends HWidget
{

    public function run()
    {        
        $devMode = HSetting::Get('devMode', 'devmode');
		if ($devMode == 1 ) {
			if (!Yii::app()->user->isGuest) {
				if (Yii::app()->user->isAdmin()) {
					$this->render('DevModePanel', array('devMode' => $devMode));
				}
			}
		} 
    }

}

