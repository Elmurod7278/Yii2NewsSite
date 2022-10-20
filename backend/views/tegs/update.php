<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tegs */

$this->title = Yii::t('app', 'Update Tegs: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tegs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tegs-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
