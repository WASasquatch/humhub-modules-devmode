<?php
class DevModeConfigureForm extends CFormModel {

    public $devMode;
	public $devDescription;

    public function rules() {
        return array(
            array('devMode', 'required'),
            array('devMode', 'in', 'range' => array(0, 1)),
            array('devDescription', 'safe')
        );
    }

    public function attributeLabels() {
        return array(
            'devMode' => Yii::t('devmode.views_admin_edit', 'Activate Development Mode?'),
            'devDescription' => Yii::t('devmode.views_admin_edit', 'Maintenance Summary')
        );
    }

}