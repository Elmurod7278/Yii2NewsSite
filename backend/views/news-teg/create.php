<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NewsTeg */

$this->title = Yii::t('app', 'Create News Teg');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News Tegs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-teg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
