<?php

namespace example\controllers;

use yii\web\Controller;

class ExampleController extends Controller {

    public $layout = 'example';
    public $defaultAction = 'index';
    
    // EXAMPLE
    public function actionExample(){
        
        // $this->layout = 'example';
        return $this->render('index');
        
    }

}