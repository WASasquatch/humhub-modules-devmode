<?php
class DevModeConfigureForm extends CFormModel {

    public $devMode;

    public function rules() {
        return array(
            array('devMode', 'required'),
            array('devMode', 'in', 'range' => array(0, 1))
        );
    }

    public function attributeLabels() {
        return array(
            'devMode' => Yii::t('devmode.base', 'Activate Development Mode?'),
        );
    }

}