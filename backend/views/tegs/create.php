<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tegs */

$this->title = Yii::t('app', 'Create Tegs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tegs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tegs-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
