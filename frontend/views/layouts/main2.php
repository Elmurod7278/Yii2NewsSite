<?php

/** @var \yii\web\View $this */

/** @var string $content */


use common\helpers\Utilities;
use common\models\Categories;
use frontend\assets\NewsAsset;
use yii\helpers\Html;



NewsAsset::register($this);
?>
<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <!-- Required meta tags -->
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>World Time</title>
        <!-- plugin css for this page -->
        <?php $this->head() ?>
    </head>

    <body>
    <?php $this->beginBody() ?>
    <div class="container-scroller">
        <div class="main-panel">
            <!-- partial:partials/_navbar.html -->
            <header id="header">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="navbar-bottom pt-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a class="navbar-brand" href="/"
                                    ><img src="/images/21601.png" alt="" style="width: 50px"
                                        /></a>
                                </div>
                                <div>
                                    <button
                                            class="navbar-toggler"
                                            type="button"
                                            data-target="#navbarSupportedContent"
                                            aria-controls="navbarSupportedContent"
                                            aria-expanded="false"
                                            aria-label="Toggle navigation"
                                    >
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div
                                            class="navbar-collapse justify-content-center collapse"
                                            id="navbarSupportedContent"
                                    >
                                        <ul
                                                class="navbar-nav d-lg-flex justify-content-between align-items-center"
                                        >
                                            <li>
                                                <button class="navbar-close">
                                                    <i class="mdi mdi-close"></i>
                                                </button>
                                            </li>
                                            <?php $categories = Categories::find()->all();
                                            foreach ($categories as $category) {

                                                ?>
                                                <li class="nav-item active">
                                                    <a class="nav-link"
                                                       href="<?= \yii\helpers\Url::to(['site1/category-news', 'id' => $category->id]) ?>"><?= $category->name_uz ?></a>
                                                </li>

                                                <?php
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </div>


                                <div class="dropdown">
                                    <button class="btn btn-primary " type="button" data-toggle="dropdown"
                                            aria-expanded="false">
                                        <?= Yii::t('app', 'Lang') ?>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="<?= Utilities::addParamToUrl(['language' => 'en']) ?>">English</a>
                                        <a class="dropdown-item"
                                           href="<?= Utilities::addParamToUrl(['language' => 'uz']) ?>">Uzbek</a>
                                    </div>
                                </div>
                                <div>
                                    <?php if (Yii::$app->user->identity) {
                                        ?>
                                        <?php echo
                                        Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form']).
                                        Html::submitButton(
                                            'Logout (' . Yii::$app->user->identity->username . ')',
                                            ['class' => 'btn btn-link']
                                        ).
                                         Html::endForm()
                                        ?>


                                        <?php
                                    } else {
                                        ?>
                                        <a href="site/login">login</a>
                                        <a href="site/signup">register</a>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                    </nav>

                </div>

            </header>
            <!--            region navbar-->
            <div>
                <ul class="nav nav-tabs">
                    <?php $regions = \common\models\Regions::find()->all();
                    foreach ($regions as $region) {

                        ?>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="<?= \yii\helpers\Url::to(['site1/region-news', 'id' => $region->id]) ?>"><?= $region->name_en ?></a>
                        </li>

                        <?php
                    }
                    ?>


                </ul>
            </div>

            <!-- partial -->

            <div class="content-wrapper">
                <div class="container">
                    <div class="mb-4">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100"
                                         src='/uploads/storage/advertise/1250x226.jpg'
                                         alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100"
                                         src="<?= '/uploads/storage/advertise/QALAMPIR2_B copy.jpg' ?>"
                                         alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100"
                                         src="<?= '/uploads/storage/advertise/QALAMPIR2_B copy.jpg' ?>"
                                         alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?= $content ?>
            </div>
            <!-- main-panel ends -->
            <!-- container-scroller ends -->

            <!-- partial:partials/_footer.html -->
            <footer>
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <img src="images/21601.png" class="footer-logo" alt="" style="width: 50px"/>
                                <h5 class="font-weight-normal mt-4 mb-5">
                                    <?= Yii::t('app', 'Copying, distribution and uploading in other forms of the materials published on the "News" site can be done only with the written consent of the editors.') ?>

                                </h5>
                                <ul class="social-media mb-3">
                                    <li>
                                        <a href="https://www.facebook.com/ElmurodSuyunov01">
                                            <i class="mdi mdi-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/suyunov__elmurod/">
                                            <i class="mdi mdi-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://telegram.me//elmurodsuyunov02">
                                            <i class="mdi mdi-telegram"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <div class="fs-14 font-weight-600">
                                        © 2022 @ <a href="#" target="_blank"
                                                    class="text-white"> Elmurod Suyunov</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </footer>

            <!-- partial -->
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();

