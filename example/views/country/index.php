<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<h1>Countries</h1>

<ul>
    <?php foreach ($countries as $country): ?>
        <li>
            <?php echo Html::encode("{$country->name} ({$country->code})"); ?>:
            <?php echo $country->population; ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php echo LinkPager::widget(['pagination' => $pagination]); ?>