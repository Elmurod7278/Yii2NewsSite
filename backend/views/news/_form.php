<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-4">            <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">            <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">            <?= $form->field($model, 'desc_en')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-4">            <?= $form->field($model, 'desc_uz')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-4">        <?= $form->field($model, 'body_uz')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-4">        <?= $form->field($model, 'body_en')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-4">

            <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Categories::find()->all(), 'id', 'name_uz'),
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'type')->checkbox(['id' => 'type']) ?>

            <?= $form->field($model, 'video')->textInput(['id' => 'urlDiv', 'placeholder' => 'video urlini kiriting', 'style' => 'display:none'])->label(false) ?>

        </div>
        <div class="col-4">
            <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Regions::find()->all(), 'id', 'name_uz'),
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
</div>


<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
</div>


<?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs(<<<JS
   
    let type=$('#type');
    let urlDiv=$('#urlDiv');
    type.on('change',function (){
        urlDiv.toggle();
    })

JS
);
?>
