<?php
// \app\components\ExcelGrid::widget([ OR
use backend\components\ExcelGrid;

/** @var TYPE_NAME $dataProvider */
/** @var TYPE_NAME $searchModel */
ExcelGrid::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    //'extension'=>'xlsx',
    //'filename'=>'excel',
    'properties' => [
        //'creator' =>'',
        //'title' => '',
        //'subject' => '',
        //'category' => '',
        //'keywords' => '',
        //'manager' => '',
        //'description'=>'BSOURCECODE',
        //'company' =>'BSOURCE',
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'username',
        'createdby',
        'createdon',
    ],
]);