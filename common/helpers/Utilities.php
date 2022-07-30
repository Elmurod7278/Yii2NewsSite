<?php

namespace common\helpers;
use Yii;
use yii\helpers\Url;

class Utilities{
    public static function addParamToUrl($array)
    {

        $params = $_GET;
        unset($params['language']);
        unset($params['category_id']);
        unset($params['product_id']);
        return Url::to(array_merge(['/' . Yii::$app->request->pathInfo], array_merge($params, $array)));
    }
}