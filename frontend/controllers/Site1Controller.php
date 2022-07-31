<?php

namespace frontend\controllers;

use common\models\Categories;
use common\models\News;
use common\models\NewsTeg;
use common\models\Regions;
use yii\web\Controller;


class Site1Controller extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegionNews($id)
    {

        $model = Regions::find()->where(['id' => $id])->one();

        return $this->render('partials/region_news', ['model' => $model]);
    }

    public function actionCategoryNews($id)
    {

        $model = Categories::find()->where(['id' => $id])->one();

        return $this->render('partials/category_news', ['model' => $model]);
    }

    public function actionNewsView($id)
    {
        $model = News::find()->where(['id' => $id])->one();
        return $this->render('partials/news_view', ['model' => $model]);
    }

    public function actionTegNews($teg_id)
    {
        $model=NewsTeg::find()->where(['teg_id'=>$teg_id])->all();
        return $this->render('partials/teg_news',['model'=>$model]);
    }
}