<?php /** @var TYPE_NAME $model */
?>
<div class="content-wrapper">
    <div class="container">
        <div class="col-sm-12">
            <div class="card" data-aos="fade-up">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="font-weight-600 mb-4" style="color: blue">

                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($model as $mod) {

                            ?>
                            <div class="col-lg-6">

                                <div class="row">
                                    <div class="col-sm-4 grid-margin">
                                        <div class="rotate-img">
                                            <img data-url="<?= \yii\helpers\Url::to(['site1/news-view', 'id' => $mod->news->id]) ?>"
                                                 src="<?= '/uploads/storage/data/'. $mod->news->image ?>"
                                                 alt="banner"
                                                 class="img-fluid"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-8 grid-margin">
                                        <a href="<?= \yii\helpers\Url::to(['site1/news-view', 'id' => $mod->news->id]) ?>"
                                           class="font-weight-600 mb-2">

                                            <?= $mod->news['title_'.Yii::$app->language] ?>
                                        </a>
                                        <p class="fs-13 text-muted mb-0">
                                            <span class="mr-2">  <?= $mod->news->created_at ?></span>
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