<?php /** @var TYPE_NAME $model */

$region_news = \common\models\News::find()->where(['region_id' => $model->id])->all();
$region_names = \common\models\Regions::find()->where(['id' => $model->id])->one();


?>
<div class="content-wrapper">
    <div class="container">
        <div class="col-sm-12">
            <div class="card" data-aos="fade-up">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="font-weight-600 mb-4" style="color: blue">
                                <?= $region_names['name_' . Yii::$app->language]?>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($region_news as $region_new) {

                            ?>
                            <div class="col-lg-6">

                                <div class="row">
                                    <div class="col-sm-4 grid-margin">
                                        <div class="rotate-img">
                                            <img data-url="<?= \yii\helpers\Url::to(['site1/news-view', 'id' => $region_new->id]) ?>"
                                                 src="<?= '/uploads/storage/data/'. $region_new->image ?>"
                                                 alt="banner"
                                                 class="img-fluid"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-8 grid-margin">
                                        <a href="<?= \yii\helpers\Url::to(['site1/news-view', 'id' => $region_new->id]) ?>"
                                           class="font-weight-600 mb-2">
                                            <?= substr( $region_new['title_' . Yii::$app->language],0,70).'...'?>
                                        </a>
                                        <p class="fs-13 text-muted mb-0">
                                            <span class="mr-2">  <?= $region_new->created_at ?></span>
                                        </p>
                                        <p class="fs-15">
                                            <?= substr( $region_new['desc_' . Yii::$app->language],0,150).'...'?>

                                        </p>
                                    </div>
                                </div>

                            </div>
                            <?php

                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>