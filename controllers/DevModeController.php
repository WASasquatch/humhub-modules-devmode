<?php

class DevModeController extends Controller
{

    /**
     *
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl'
        ); 
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     *
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
				'allow', 
                'users' => array('*'),
            )
        );
    }

}

?>
