<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NewsTeg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-teg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'news_id')->textInput() ?>

    <?= $form->field($model, 'teg_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
