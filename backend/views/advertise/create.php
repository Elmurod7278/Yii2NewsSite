<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Advertise */

$this->title = Yii::t('app', 'Create Advertise');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Advertises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
