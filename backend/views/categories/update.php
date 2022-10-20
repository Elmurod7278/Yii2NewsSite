<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */

$this->title = Yii::t('app', 'Update Categories: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categories-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
