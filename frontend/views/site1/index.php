<div class="container">

    <div class="row" data-aos="fade-up">
        <div class="col-lg-3 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2> <?=Yii::t('app','Category')?></h2>
                    <?php use common\models\Categories;

                    $categories = Categories::find()->all();
                    foreach ($categories as $category) {

                        ?>
                        <ul class="vertical-menu">
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['site1/category-news', 'id' => $category->id]) ?>"><?= $category->name_uz ?></a>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">

                    <?php $news = \common\models\News::find()->limit(3)->orderBy('created_at DESC')->all();
                    foreach ($news as $new) {

                        ?>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <div class="position-relative">
                                    <div class="rotate-img">
                                        <img
                                                src="<?= '/uploads/storage/data/'. $new->image ?>"
                                                alt="thumb"
                                                class="img-fluid"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="<?=\yii\helpers\Url::to(['site1/news-view','id'=>$new->id])?>" class="mb-2 font-weight-600" style="font-size: 20px">
                                    <?= $new['title_'.Yii::$app->language]  ?>
                                </a>
                                <div class="fs-13 mb-2">
                                    <span class="mr-2"><?= $new->created_at ?></span>
                                </div>
                                <p class="mb-0">
                                    <?= substr( $new['desc_' . Yii::$app->language],0,150).'...'?>
                                </p>
                            </div>
                        </div>
                        <?php

                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div class="row" data-aos="fade-up">

        <div class="col-lg-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php $newss= \common\models\News::find()->limit(8)->orderBy('created_at')->all();
                        foreach ($newss as $new) {
                            ?>

                            <div class="col-sm-3">
                                <div class="position-relative">
                                    <div class="rotate-img">
                                        <img
                                                src="<?= '/uploads/storage/data/'. $new->image ?>"
                                                alt="thumb"
                                                class="img-fluid"
                                        />
                                    </div>
                                    <a href="<?=\yii\helpers\Url::to(['site1/news-view','id'=>$new->id])?>" class="mb-2 font-weight-600">
                                        <?= substr( $new['title_' . Yii::$app->language],0,70).'...'?>

                                    </a>
                                    <div class="fs-13 mb-2">
                                        <br>
                                        <span class="mr-2"><?=$new->created_at?> </span>
                                    </div>
                                    <p class="mb-0">
                                        <?= substr( $new['desc_' . Yii::$app->language],0,150).'...'?>

                                    </p>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-aos="fade-up">
        <div class="col-sm-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div
                            class="d-flex justify-content-between align-items-center"
                    >
                        <div class="card-title">
                            <?=Yii::t('app','Editor\'s Choice')?>

                        </div>
                    </div>
                    <div class="row">

                        <?php $recommendation = \common\models\Recommendations::find()->all();
                        foreach ($recommendation as $recommend) {
                            ?>
                            <div class="col-lg-4">
                                <div
                                        class="d-flex justify-content-between align-items-center border-bottom pb-2"
                                >
                                    <div class="div-w-80 mr-3">
                                        <div class="rotate-img">
                                            <img
                                                    src="<?= 'http://storagenews/news/' . $recommend->news->image ?>"
                                                    alt="thumb"
                                                    class="img-fluid"
                                            />
                                        </div>
                                    </div>
                                    <a href="<?= \yii\helpers\Url::to(['site1/news-view', 'id' => $recommend->news->id]) ?>"
                                       class="font-weight-600 mb-0" style="font-size: 17px">
                                        <?= $recommend->news->title_uz ?>
                                    </a>
                                </div>
                            </div>
                            <?php

                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



