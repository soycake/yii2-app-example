<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

use common\components\ExampleAsset;
ExampleAsset::register($this);

?>

<?php $this->beginContent( '@app/../themes/main/views/layouts/bootstrap.php' ); ?>

    <div class="wrap">
        
        <?php
        
            NavBar::begin([
                'brandLabel' => Yii::$app->params['name'],
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
            ]);
            
            $menuItems = [['label' => 'Home', 'url' => ['/site/index']]];
            
            if (Yii::$app->user->isGuest) {
                
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            
            } else {
                
                $menuItems[] = '<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',['class' => 'btn btn-link']) . Html::endForm(). '</li>';
                
            }
            
            echo Nav::widget(['options' => ['class' => 'navbar-nav navbar-right'],'items' => $menuItems]);
            NavBar::end();
            
        ?>

        <div class="container">
            <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]); ?>
            <?php echo Alert::widget(); ?>
            <?php echo $content; ?>
        </div>
        
    </div>

<?php $this->endContent(); ?>