<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Advertise */

$this->title = Yii::t('app', 'Update Advertise: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Advertises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="advertise-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
