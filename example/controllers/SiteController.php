<?php

namespace example\controllers;

use yii\web\Controller;

class SiteController extends Controller {

    public $layout = 'example';
    public $defaultAction = 'index';
    
    // EXAMPLE
    public function actionExample(){
        // $this->layout = 'backend';
        return $this->render('index');
    }
    
    public function actionIndex(){
        return $this->render('index');
    }

}