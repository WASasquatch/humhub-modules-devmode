<?php

class ConfigController extends Controller
{

    public $subLayout = "application.modules_core.admin.views._layout";

    /**
     *
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl'
        ); // perform access control for CRUD operations

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
                'expression' => 'Yii::app()->user->isAdmin()'
            ),
            array(
                'deny', // deny all users
                'users' => array(
                    '*'
                )
            )
        );
    }

    /**
     * Configuration Action for Super Admins
     */
    public function actionConfig()
    {
        Yii::import('devmode.forms.*');
        
        $form = new DevModeConfigureForm();
        
        if (isset($_POST['DevModeConfigureForm'])) {
            $_POST['DevModeConfigureForm'] = Yii::app()->input->stripClean($_POST['DevModeConfigureForm']);
            $form->attributes = $_POST['DevModeConfigureForm'];
            
            if ($form->validate()) {
                $form->devMode = HSetting::Set('devMode', $form->devMode, 'devmode');
                $this->redirect(Yii::app()->createUrl('devmode/config/config'));
            }
        } else {
            $form->devMode = HSetting::Get('devMode', 'devmode');
        }
        
        $this->render('config', array(
            'model' => $form
        ));
    }
}

?>
