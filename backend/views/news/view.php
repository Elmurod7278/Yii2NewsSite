<?php

use common\models\News;
use common\models\Tegs;
use lesha724\youtubewidget\Youtube;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php
foreach (common\models\Recommendations::find()->each() as $test1) {
//    \yii\helpers\VarDumper::dump($test1->news_id,12,true);die();
    echo $test1->news_id . '<br>';
}

if (Yii::$app->session->hasFlash('error')) {
    \yii\helpers\VarDumper::dump(Yii::$app->session->getFlash('error'));
}
?>


<div class="news-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
        <?= Html::beginForm(['recommend', 'id' => $model->id], 'POST'); ?>
        <?= Html::button(Yii::t('app', 'Recommendation'), ['class' => 'btn btn-primary', 'type' => 'submit']); ?>
        <?= Html::endForm() ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title_uz',
            'title_en',
            'desc_uz:ntext',
            'desc_en:ntext',
            'body_uz',
            'body_en',

            [
                'attribute' => 'image',
                'value' => function ($model) {
                    return Html::a(Yii::t('app', $model->image), ['/uploads/storage/data/' . $model->image]);
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'video',
                'value' => function ($model) {
                    return Youtube::widget([

                        'video' => $model->video,
                        /*
                            or you can use
                            'video'=>'CP2vruvuEQY',
                        */
                        'iframeOptions' => [ /*for container iframe*/
                            'class' => 'youtube-video'
                        ],
                        'divOptions' => [ /*for container div*/
                            'class' => 'youtube-video-div'
                        ],
                        'height' => 390,
                        'width' => 640,

                    ]);
                },
                'format' => 'raw'

            ],
            'views_count',
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category->name_uz;
                }
            ],
            [
                'attribute' => 'region_id',
                'value' => function ($model) {
                    return $model->region ? $model->region->name_uz : '---';
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="col-4">
    <?= $form->field($tegModel, 'teg_id')->dropDownList(ArrayHelper::map(Tegs::find()->all(), 'id', 'name_uz')) ?>
</div>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>






















































